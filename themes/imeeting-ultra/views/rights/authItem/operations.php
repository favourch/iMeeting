<?php $this->breadcrumbs = array(
	'Rights'=>Rights::getBaseUrl(),
	Rights::t('core', 'Operations'),
); ?>

<div id="operations">

	

	<p>
		<?php echo Rights::t('core', 'An operation is a permission to perform a single operation, for example accessing a certain controller action.'); ?><br />
		<?php echo Rights::t('core', 'Operations exist below tasks in the authorization hierarchy and can therefore only inherit from other operations.'); ?>
	</p>

	


	<p class="info"><?php echo Rights::t('core', 'Values within square brackets tell how many children each item has.'); ?></p>

</div>
<div class="table_tabs_menu" style="padding-top:10px">
        <!--[if !IE]>start  tabs<![endif]-->
    <?php echo CHtml::link('<span><span><em>'. Rights::t('core', 'Create a new operation') .'</em></span></span>', array('authItem/create', 'type'=>CAuthItem::TYPE_OPERATION), array(
        'class'=>'update',
    )); ?>
        <!--[if !IE]>end  tabs<![endif]-->

        
        </div>
        <!--[if !IE]>start table_wrapper<![endif]-->
        <div class="table_wrapper">
            <div class="table_wrapper_inner">
            <?php
            $widget= $this->widget('application.components.widgets.ImeetingGridView', array(
                
                'pager'=>array('cssFile'=>false,'class'=>'ImeetingLinkPager'),

                'template'=>'{items} ',
                'dataProvider'=>$dataProvider,
                'cssFile' => false,
                 'emptyText'=>Rights::t('core', 'No users found.'),
               
                 'columns'=>array(
                    array(
                        'name'=>'name',
                        'header'=>Rights::t('core', 'Name'),
                        'type'=>'raw',
                        'htmlOptions'=>array('class'=>'name-column'),
                        'value'=>'$data->getGridNameLink()',
                    ),
                    array(
                        'name'=>'description',
                        'header'=>Rights::t('core', 'Description'),
                        'type'=>'raw',
                        'htmlOptions'=>array('class'=>'description-column'),
                    ),
                    array(
                        'name'=>'bizRule',
                        'header'=>Rights::t('core', 'Business rule'),
                        'type'=>'raw',
                        'htmlOptions'=>array('class'=>'bizrule-column'),
                        'visible'=>Rights::module()->enableBizRule===true,
                    ),
                    array(
                        'name'=>'data',
                        'header'=>Rights::t('core', 'Data'),
                        'type'=>'raw',
                        'htmlOptions'=>array('class'=>'data-column'),
                        'visible'=>Rights::module()->enableBizRuleData===true,
                    ),
                    array(
                        'header'=>'&nbsp;',
                        'type'=>'raw',
                        'htmlOptions'=>array('class'=>'actions-column'),
                        'value'=>'$data->getDeleteOperationLink()',
                    ),
                )

            ));

             ?>
    <div class="pagination_wrapper">
        <span class="pagination_top"></span>
        <div class="pagination_middle">
        <div class="pagination">
            <span class="page_no"><?php $widget->renderSummary(); ?></span>
            <?php $widget->renderPager(); ?>
        </div>
        </div>
        <span class="pagination_bottom"></span>
        </div>

            </div>
        </div>
        <!--[if !IE]>end table_wrapper<![endif]-->
    
