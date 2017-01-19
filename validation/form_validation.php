<?php

class FormValidation
{

    public function validateAddQuizForm($quizTitle, $quizDescription, $quizCategoryId)
    {
        if (ValidationUtils::isEmpty($quizTitle) || ValidationUtils::isEmpty($quizCategoryId) || ValidationUtils::isEmpty
            ($quizDescription)
        ) {
            MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.empty.form.fields'));
            RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
        } else if (!ValidationUtils::hasCorrectLength(Config::QUIZ_NAME_MIN, Config::QUIZ_NAME_MAX,
            $quizTitle)
        ) {
            MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.quiz.name.wrong.length'));
            RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
        } else if (!ValidationUtils::hasCorrectLength(Config::QUIZ_DESCRIPTION_MIN, Config::QUIZ_DESCRIPTION_MAX,
            $quizDescription)
        ) {
            MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.quiz.description.wrong.length'));
            RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
        } else if (!ValidationUtils::matchesPattern(ValidationUtils::REGEXP_ALPHANUM_DASH_UNDERSCORE, $quizTitle)) {
            MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.quiz.name.wrong.pattern'));
            RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
        } else if (!ValidationUtils::matchesPattern(ValidationUtils::REGEXP_ALPHANUM_DASH_UNDERSCORE, $quizDescription)) {
            MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.quiz.description.wrong.pattern'));
            RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
        } else if (!ValidationUtils::isSetAsInt($quizCategoryId)) {
            MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.quiz.category.not.integer'));
            RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
        }
        return true;
    }

    public function validateAddQuestionForm($quizId, $content, $answers)
    {
        if (ValidationUtils::isEmpty($quizId) || ValidationUtils::isEmpty($content) || ValidationUtils::isEmpty
            ($answers)
        ) {
            MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.empty.form.fields'));
            RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
        }
        return true;
    }


}