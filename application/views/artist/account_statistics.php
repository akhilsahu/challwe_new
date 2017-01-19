<script src="<?php echo base_url();?>plugins/highchart/highcharts.js"></script>
<script src="<?php echo base_url();?>plugins/highchart/exporting.js"></script>
<style>
.sidebar .widget, .widget {
    margin-bottom: 35px;
}
#sidebar h3 {
    padding-top: 7px;
}
.sidebar-nav li {
    padding: 10px;
    background-color: #fafafa;
    width: 100%;
    margin-bottom: 5px;
    color: #000;
}
ul, li, ol {
    line-height: 24px;
    margin: 0;
}
#search-form form, ul.post-meta, .sidebar ul, ul.tabs, .testimonials ul, ul.why, .panel-heading h3, .features .panel-heading h4, #options ul, .gallery ul {
    margin: 0;
}
.widget ul {
    list-style: none;
    padding: 0;
}
ul, li, ol {
    line-height: 24px;
    margin: 0;
}
.sidebar-nav li a {
    color: #000;
    width: 100%;
}
nav li.active, .sidebar-nav li:hover, .btn.btn-shopping-cart .fa {
    background-color: #59ab02;
}
.sidebar-nav li.active {
    padding: 10px;
    width: 100%;
    margin-bottom: 5px;
    color: #ffffff !important;
}
h2.title {
    font-size: 26px;
    line-height: 40px;
    margin: 20px 0;
    color: #fff;
}
.margin-bottom60 {
    margin-bottom: 60px;
}
.margin-top60 {
    margin-top: 60px;
}
@media (min-width: 768px)
.container {
    width: 750px;
}
.pricing_plan h3, .pricing_plan.special h3, .sidebar-nav li.active, .sidebar-nav li:hover, .btn.btn-shopping-cart .fa {
    background-color: #59ab02;
}

.sidebar-nav li.active {
    padding: 10px;
    width: 100%;
    margin-bottom: 5px;
    color: #ffffff !important;
}
.pattern-overlay {
    background-color: rgba(89, 171, 2, 0.75);
}
</style>

<section id="main">
    <div class="breadcrumb-wrapper">
        <div class="pattern-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                        <h2 class="title">My Statistics</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <div class="content margin-top60 margin-bottom60">
        <div class="container">
            <div class="row">
                <!-- Left Section -->
                    <div class="col-sm-9 col-md-9 col-lg-9">
                    <div class="title-box">
                        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                    </div>
                </div>
                <!-- /Left Section -->
                <!-- Sidebar -->
                <div id="sidebar" class="sidebar col-sm-3 col-md-3 col-lg-3">
                    <div class="widget">
                        <h3>My Account</h3>
                        <!-- menu-->
                        <div id="sidebar-nav">
                            <ul class="sidebar-nav">
                                <li>
                                    <a href="<?php echo site_url();?>/artist/dashboard"><i class="fa fa-gears item-icon"></i> My Dashboard</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url();?>/artist/accountDetails"><i class="fa fa-user item-icon"></i> Account Details</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url();?>/artist/accountPortfolio"><i class="fa fa-pencil-square-o item-icon"></i> Portfolio</a>
                                </li>
                                <li class="active">
                                    <a href="#" style="color:#fff"><i class="fa fa-bar-chart item-icon"></i> Statistics</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url();?>/artist/accountSocial"><i class="fa fa-link item-icon"></i> Social Availabilty</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /menu-->
                    </div>
                </div>
                <!-- /Sidebar -->
            </div>
        </div>
    </div>
    <!-- /Main Content -->
</section>
<?php 
$date_arr=array();
$no_of_views='';
foreach($view_details as $val){
    $date_arr[]=date('j M y',strtotime($val['dt_date']));
    $no_of_views.=$val['int_no_of_views'].",";
}
$no_of_views=substr($no_of_views,0,-1);
?>

<script>
    $(function () {
    $('#container').highcharts({
        title: {
            text: 'Visitor Statistics',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            //categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            categories: <?php echo json_encode($date_arr);?>
        },
        yAxis: {
            title: {
                text: 'No. of views'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Profile Views',
             data: [<?php echo $no_of_views?>]
        }]
    });
});
</script>