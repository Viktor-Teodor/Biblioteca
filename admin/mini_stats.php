<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-user fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                          <?php
                          echo usercount();
                          ?>
                        </div>
                        <div>Cititori</div>
                    </div>
                </div>
            </div>
            <a href="cititori.php?sort=0">
                <div class="panel-footer">
                    <span class="pull-left">Vizualizeaza</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-apple fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo studentcount()?></div>
                        <div>Elevi</div>
                    </div>
                </div>
            </div>
            <a href="cititori.php?sort=1">
                <div class="panel-footer">
                    <span class="pull-left">Vizualizeaza</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-briefcase fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo teachercount()?></div>
                        <div>Profesori</div>
                    </div>
                </div>
            </div>
            <a href="cititori.php?sort=2">
                <div class="panel-footer">
                    <span class="pull-left">vizualizeaza</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-alert fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo debtorscount(); ?></div>
                        <div>Restantieri (indisponibil)</div>
                    </div>
                </div>
            </div>
            <a href="cititori.php?sort=3">
                <div class="panel-footer">
                    <span class="pull-left">Vizualizeaza</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
