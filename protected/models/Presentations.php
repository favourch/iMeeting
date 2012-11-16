<?php

Yii::import('application.models._base.BasePresentations');

class Presentations extends BasePresentations
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}