<?php

class CategoryController
{

    private $categoryService;
    private $formValidation;

    public function __construct()
    {
        $this->categoryService = new CategoryService();
        $this->formValidation = new FormValidation();
    }

    public function addCategory()
    {
        if (isset($_POST['name']) || isset($_POST['description'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];

            if ($this->categoryService->categoryNameExists($name)) {
                MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.category.name.exists'));
                RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
            } else if ($this->formValidation->validateAddCategoryForm($name, $description)) {
                $newCategory = new Category($name, $description);

                if ($this->categoryService->addCategory($newCategory)) {
                    MessagesUtils::setMessage(Messages::STATUS_SUCCESS, Messages::get('success.added.category'));
                    RedirectionUtils::redirectTo(Config::APP_ROOT);
                } else {
                    MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.adding.category'));
                    RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
                }
            }
        }

        require_once('views/categories/add_category.php');
    }

}
