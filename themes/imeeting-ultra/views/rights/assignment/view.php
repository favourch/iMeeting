<?php $this->breadcrumbs = array(
	'Rights'=>Rights::getBaseUrl(),
	Rights::t('core', 'Assignments'),
); ?>

<div id="assignments">

	<p>
		<?php echo Rights::t('core', 'Here you can view which permissions has been assigned to each user.'); ?>
	</p>


    <div class="table_tabs_menu" style="padding-top:10px">
        <!--[if !IE]>start  tabs<![endif]-->

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
                        'value'=>'$data->getAssignmentNameLink()',
                    ),
                    array(
                        'name'=>'assignments',
                        'header'=>Rights::t('core', 'Roles'),
                        'type'=>'raw',
                        'htmlOptions'=>array('class'=>'role-column'),
                        'value'=>'$data->getAssignmentsText(CAuthItem::TYPE_ROLE)',
                    ),
                    array(
                        'name'=>'assignments',
                        'header'=>Rights::t('core', 'Tasks'),
                        'type'=>'raw',
                        'htmlOptions'=>array('class'=>'task-column'),
                        'value'=>'$data->getAssignmentsText(CAuthItem::TYPE_TASK)',
                    ),
                    array(
                        'name'=>'assignments',
                        'header'=>Rights::t('core', 'Operations'),
                        'type'=>'raw',
                        'htmlOptions'=>array('class'=>'operation-column'),
                        'value'=>'$data->getAssignmentsText(CAuthItem::TYPE_OPERATION)',
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
    </div>
