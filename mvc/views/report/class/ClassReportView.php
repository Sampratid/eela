
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-classreport"></i> <?=$this->lang->line('report_class')?> <?=$this->lang->line('panel_title')?></h3>


        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_report')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">

            <div class="col-sm-12">
                <div class="form-group col-sm-4">
                    <label><?=$this->lang->line("report_class")?></label>
                    <?php
                         $array = array("0" => $this->lang->line("report_select_class"));
                         foreach ($classes as $classa) {
                             $array[$classa->classesID] = $classa->classes;
                         }
                         echo form_dropdown("classesID", $array, set_value("classesID"), "id='classesID' class='form-control'");
                     ?>
                </div>

                <div class="form-group col-sm-4">
                    <label><?=$this->lang->line("report_section")?></label>
                    <select id="sectionID" name="sectionID" class="form-control">
                        <option value=""><?php echo $this->lang->line("report_select_section"); ?></option>
                    </select>
                </div>

                <div class="col-sm-2">
                    <button id="get_classreport" class="btn btn-success" style="margin-top:23px;"> <?=$this->lang->line("report_submit")?></button>
                </div>

            </div>

        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

<div class="box" id="load_classreport"></div>


<script type="text/javascript">
    $(function(){
        $("#classesID").val(0);
    });

    $("#classesID").change(function() {
        var id = $(this).val();
        if(parseInt(id)) {
            if(id === '0') {
                $('#sectionID').val(0);
            } else {
                $.ajax({
                    type: 'POST',
                    url: "<?=base_url('report/getSection')?>",
                    data: {"id" : id},
                    dataType: "html",
                    success: function(data) {
                       $('#sectionID').html(data);
                    }
                });
            }
        }
    });

    $("#get_classreport").click(function() {
        var classID = $('#classesID').val();
        var sectionID = $('#sectionID').val();
        if(parseInt(classID) && (parseInt(sectionID) || parseInt(sectionID) == 0)) {
            $.ajax({
                type: 'POST',
                url: "<?=base_url('report/getClassReport')?>",
                data: {"classID" : classID, 'sectionID': sectionID},
                dataType: "html",
                success: function(data) {
                   $('#load_classreport').html(data);
                }
            });
        }
    });
</script>
