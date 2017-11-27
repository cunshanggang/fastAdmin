<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"D:\www\htdocs\fastAdmin\public/../application/admin\view\general\attachment\add.html";i:1502337746;s:76:"D:\www\htdocs\fastAdmin\public/../application/admin\view\layout\default.html";i:1502337746;s:73:"D:\www\htdocs\fastAdmin\public/../application/admin\view\common\meta.html";i:1511321003;s:75:"D:\www\htdocs\fastAdmin\public/../application/admin\view\common\script.html";i:1502337746;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="renderer" content="webkit">

<link rel="shortcut icon" href="__CDN__/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="__CDN__/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="__CDN__/assets/js/html5shiv.js"></script>
  <script src="__CDN__/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>
    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <form id="add-form" class="form-horizontal form-ajax" role="form" data-toggle="validator" method="POST" action="">
    <div class="form-group">
        <label for="c-upyun" class="control-label col-xs-12 col-sm-2"><?php echo __('Upload'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" name="row[upyun]" id="c-upyun" class="form-control" />
        </div>
    </div>

    <div class="form-group">
        <label for="c-upyun" class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button id="plupload-upyun" class="btn btn-danger plupload" data-input-id="c-upyun" ><i class="fa fa-upload"></i> <?php echo __("Upload to upyun"); ?></button>
        </div>
    </div>

    <div class="form-group">
        <label for="c-local" class="control-label col-xs-12 col-sm-2"><?php echo __('Upload'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" name="row[local]" id="c-local" class="form-control" />
        </div>
    </div>

    <div class="form-group">
        <label for="c-local" class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button id="plupload-local" class="btn btn-primary plupload" data-input-id="c-local" data-url="<?php echo url('ajax/upload'); ?>"><i class="fa fa-upload"></i> <?php echo __("Upload to local"); ?></button>
        </div>
    </div>

    <div class="form-group">
        <label for="c-local" class="control-label col-xs-12 col-sm-2"><?php echo __('Upload by summernote'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea name="row[summernote]" id="c-summernote" cols="60" rows="5" class="summernote"></textarea>
        </div>
    </div>
    <div class="form-group hidden layer-footer">
        <div class="col-xs-2"></div>
        <div class="col-xs-12 col-sm-8">
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="__CDN__/assets/js/require.js" data-main="__CDN__/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>