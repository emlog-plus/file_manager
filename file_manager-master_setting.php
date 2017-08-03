<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> 首页</a></li>
<li class="active">文件管理器</li>
</ul>
</div>     

<?php

!defined('EMLOG_ROOT') && exit('access deined!');

function plugin_setting_view(){
if(ROLE!=ROLE_ADMIN){
        emMsg(langs('no_permission'));
    }

}

if($_REQUEST['file_name'] && $_REQUEST['file_text']){
    $isSuccess = file_put_contents($_REQUEST['file_name'], $_REQUEST['file_text']);
    if ($isSuccess) {
        echo ' <div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>已成功保存设置</div>';
    } else {
        echo ' <div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>更改设置失败：权限不足，或写入字符串为空</div>';
    }
}

$dir = $_REQUEST['dir'] ? $_REQUEST['dir'] : __DIR__;
$up = explode(DIRECTORY_SEPARATOR, $dir);
array_pop($up);
$up = join(DIRECTORY_SEPARATOR, $up);
if(!$up){
    $up = DIRECTORY_SEPARATOR;
}
$files = array_diff(scandir($dir), array('.', '..'))

?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">		
<div class="table-wrap ">
<div class="table-responsive">	

            <form method="get">
<table class="table table-striped table-bordered mb-0" >            
                              
                    <a href="?plugin=file_manager&dir=<?=$up?>">上一层</a>
            
                <input type="hidden" name="plugin" value="file_manager">
                <input type="text" name="dir" value="<?=$dir?>" class="form-control">
            </form>


               
<?php if($files):?>
                
<thead>
 <tr>
 <th><b>#</b></th> <th><b>名称</b></th>
 <th><b>权限</b></th>
  </tr>
</thead>
<tbody>                
                <?php foreach($files as $file){ ?>
      <tr>
                    <td><?php $path = $dir . DIRECTORY_SEPARATOR . $file ?>
                   
                        <i class="fa fa-file"></i>
                        </td>
                        <td>
                        <a href="?plugin=file_manager-master&dir=<?=$path?>">
                            <b><?=$file?></b>
                            </a>
                            </td>
                            <td>
                            权限 <?=is_dir($path) ? '夹' : '文件' ?> <?=substr(sprintf('%o', fileperms($path)), -3);?>
                        
                        </td>
                   
</tr>
                <?php } ?>
                
                                </tbody>
</table>

      </div>
      </div>
                </div>
               
</div>
                
                <?php endif ?>
                
                
                
  <?php if(!is_dir($dir)){ ?>

                <form method="post">
                        文件 "<b><?=$dir?></b>"
                        <input type="hidden" name="file_name" value="<?=$dir?>"><br>
                        文件权限 - <b><?=substr(sprintf('%o', fileperms($dir)), -3);?></b>
                        <textarea name="file_text" class="form-control"  style="height:480px"><?=file_get_contents($dir)?></textarea>
                        
                        <div class="form-group" style="padding-top:10px">
                        <input type="submit" class="btn  btn-success" value="保存" />
                        </div>
                    </form>
                    </table>
                          </div>
      </div>
              
               
</div>
             </div>
                    
               

                <?php } ?>                
                
                
                <script>

setTimeout(hideActived,2600);
$("#menu_mg").addClass('active');
$("#menu_file").addClass('active-page');
</script>