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

    public function validateAddQuestionForm($question, $answer1, $answer2, $answer3, $correctAnswer)
    {
        if (ValidationUtils::isEmpty($question) || ValidationUtils::isEmpty($answer1) || ValidationUtils::isEmpty
            ($answer2) || ValidationUtils::isEmpty($answer3)
        ) {
            MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.empty.form.fields'));
            RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
        } else if (!ValidationUtils::hasCorrectLength(Config::QUESTION_LENGTH_MIN, Config::QUESTION_LENGTH_MAX,
            $question)
        ) {
            MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.question.wrong.length'));
            RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
        } else if (!ValidationUtils::hasCorrectLength(Config::ANSWER_LENGTH_MIN, Config::ANSWER_LENGTH_MAX,
                $answer1) || !ValidationUtils::hasCorrectLength(Config::ANSWER_LENGTH_MIN, Config::ANSWER_LENGTH_MAX,
                $answer2) || !ValidationUtils::hasCorrectLength(Config::ANSWER_LENGTH_MIN, Config::ANSWER_LENGTH_MAX,
                $answer3)
        ) {
            MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.answer.wrong.length'));
            RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
        }
        return true;
    }

    public function validateAddCategoryForm($name, $description)
    {
        if (ValidationUtils::isEmpty($name) || ValidationUtils::isEmpty($description)) {
            MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.empty.form.fields'));
            RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
        } else if (!ValidationUtils::hasCorrectLength(Config::CATEGORY_NAME_MIN, Config::CATEGORY_NAME_MAX,
            $name)
        ) {
            MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.category.name.wrong.length'));
            RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
        } else if (!ValidationUtils::hasCorrectLength(Config::CATEGORY_DESCRIPTION_MIN, Config::CATEGORY_DESCRIPTION_MAX,
            $description)
        ) {
            MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.category.desc.wrong.length'));
            RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
        }
        return true;
    }


}