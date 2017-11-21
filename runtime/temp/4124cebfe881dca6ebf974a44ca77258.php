<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:73:"D:\www\htdocs\fastadmin\public/../application/admin\view\addon\index.html";i:1502337746;s:76:"D:\www\htdocs\fastadmin\public/../application/admin\view\layout\default.html";i:1502337746;s:73:"D:\www\htdocs\fastadmin\public/../application/admin\view\common\meta.html";i:1502337746;s:75:"D:\www\htdocs\fastadmin\public/../application/admin\view\common\script.html";i:1502337746;}*/ ?>
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
                                <style type="text/css">
    .addon {
        height:100%;position: relative;
    }
    .addon > span {
        position:absolute;left:15px;top:15px;
    }
    .layui-layer-pay .layui-layer-content {
        padding:0;height:600px!important;
    }
    .layui-layer-pay {border:none;}
</style>
<div class="panel panel-default panel-intro">
    <?php echo build_heading(); ?>

    <div class="panel-body">
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="one">
                <div class="widget-body no-padding">
                    <div id="toolbar" class="toolbar">
                        <?php echo build_toolbar('refresh'); ?>
                        <button type="button" id="plupload-addon" class="btn btn-danger plupload" data-url="addon/local" data-mimetype="application/zip" data-multiple="false"><i class="fa fa-upload"></i> <?php echo __('本地安装'); ?></button>
                        <a class="btn btn-success btn-ajax" href="addon/refresh"><i class="fa fa-refresh"></i> <?php echo __('刷新插件缓存'); ?></a>
                    </div>
                    <table id="table" class="table table-striped table-hover" width="100%">

                    </table>

                </div>
            </div>

        </div>
    </div>
</div>
<script id="paytpl" type="text/html">
    <div style="position:relative;width:800px;height:600px;background:url('<%=payimg%>') 0 0 no-repeat;">
        <div style="position:absolute;left:265px;top:442px;">
            <%=paycode%>
        </div>
        <div style="position:absolute;left:660px;top:442px;">
            <%=paycode%>
        </div>
    </div>
</script>
<script id="conflicttpl" type="text/html">
    <div class="alert alert-dismissable alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>警告!</strong> 此插件中发现和现有系统中部分文件发现冲突！以下文件将会被影响，请备份好相关文件后再继续操作
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>文件</th>
            </tr>
        </thead>
        <tbody>
            <%for(var i=0;i < conflictlist.length;i++){%>
            <tr>
                <th scope="row"><%=i+1%></th>
                <td><%=conflictlist[i]%></td>
            </tr>
            <%}%>
        </tbody>
    </table>
</script>
<script id="itemtpl" type="text/html">
    <div class="col-sm-4 col-md-3">
        <% var labelarr = ['primary', 'success', 'info', 'danger', 'warning']; %>
        <% var label = labelarr[item.id % 5]; %>
        <% var addon = typeof addons[item.name]!= 'undefined' ? addons[item.name] : null; %>
        <div class="thumbnail addon">
            <!--<span class="btn btn-<%=label%>">ID:<%=item.id%></span>-->
            <a href="<%=addon?addon.url:'javascript:;'%>" target="_blank"><img src="<%=item.image%>" class="img-responsive" alt="<%=item.title%>"></a>
            <div class="caption">
                <h4><%=item.title?item.title:'无'%> 
                    <% if(item.flag.indexOf("recommend")>-1){%>
                    <span class="label label-success">推荐</span>
                    <% } %>
                    <% if(item.flag.indexOf("hot")>-1){%>
                    <span class="label label-danger">热门</span>
                    <% } %>
                    <% if(item.flag.indexOf("free")>-1){%>
                    <span class="label label-info">免费</span>
                    <% } %>
                    <% if(item.flag.indexOf("sale")>-1){%>
                    <span class="label label-warning">折扣</span>
                    <% } %>
                </h4>
                <p class="text-<%=item.price>0?'danger':'success'%>"><b>￥<%=item.price%></b></p>
                <p class="text-muted">作者: <a href="<%=item.url?item.url:'javascript:;'%>" target="_blank"><%=item.author%></a></p>
                <p class="text-muted">描述: <%=item.intro%></p>
                <p class="text-muted">版本: <%=# addon && item && addon.version!=item.version?'<span class="label label-danger">'+addon.version+'</span> -> <span class="label label-success">'+item.version+'</span>':item.version%></p>
                <p class="text-muted">添加时间: <%=Moment(item.createtime*1000).format("YYYY-MM-DD HH:mm:ss")%></p>
                <!--<p class="text-muted">最后时间: <%=Moment(item.updatetime*1000).format("YYYY-MM-DD HH:mm:ss")%></p>-->
                <p class="operate" data-id="<%=item.id%>" data-name="<%=item.name%>">
                    <% if(!addon){ %>
                    <a href="javascript:;" class="btn btn-primary btn-success btn-install"><i class="fa fa-cloud-download"></i> 安装</a> 
                    <% } %>
                    <% if(addon){ %>
                    <% if(addon.config){ %>
                    <a href="javascript:;" class="btn btn-primary btn-config"><i class="fa fa-pencil"></i> 配置</a>
                    <% } %>
                    <% if(addon.state == "1"){ %>
                    <a href="javascript:;" class="btn btn-warning btn-disable" data-action="disable"><i class="fa fa-times"></i> 点击禁用</a>
                    <% }else{ %>
                    <a href="javascript:;" class="btn btn-success btn-enable" data-action="enable"><i class="fa fa-check"></i> 点击启用</a>
                    <a href="javascript:;" class="btn btn-danger btn-uninstall"><i class="fa fa-times"></i> 卸载</a>
                    <% } %>
                    <% } %>
                    <!--                    
                    <span class="pull-right" style="margin-top:10px;">
                        <input name="checkbox" data-id="<%=item.id%>" type="checkbox" />
                    </span>
                    -->
                </p>
            </div>
        </div>
    </div>
</script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="__CDN__/assets/js/require.js" data-main="__CDN__/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>