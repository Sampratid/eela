<div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <!-- <div class="user-panel">
                        <div class="pull-left image">
                            <img style="display:block" src="<?=base_url("uploads/images/".$this->session->userdata('photo'));
                                ?>" class="img-circle" alt="" />
                        </div>

                        <div class="pull-left info">
                            <?php
                                $name = $this->session->userdata("name");
                                if(strlen($name) > 11) {
                                   $name = substr($name, 0,11). "..";
                                }
                                echo "<p>".$name."</p>";
                            ?>
                            <a href="<?=base_url("profile/index")?>">
                                <i class="fa fa-hand-o-right color-green"></i>
                                <?=$this->session->userdata("usertype")?>
                            </a>
                        </div>
                    </div> -->

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <?php $usertype = $this->session->userdata("usertype"); ?>
                    <ul class="sidebar-menu">
                        <?php
                            if(count($dbMenus)) {
                                // dd($dbMenus);
                                // echo count($dbMenus);
                                for ($i=1; $i < 22  ; $i++) {
                                  if ($i == 2 || $i==3 || $i==4) {
                                    $i++;
                                  }
                                  else {
                                    if ($dbMenus[$i]['status'] == 0){
                                      // var_dump($dbMenus[$i]);
                                      // echo "\n";echo $i;

                                      unset($dbMenus[$i]);
                                    }
                                  }
                                }
                                unset($dbMenus[4]);
                                unset($dbMenus[29]);
                                unset($dbMenus[28]);
                                unset($dbMenus[33]);
                                unset($dbMenus[51]);
                                unset($dbMenus[23]);
                                unset($dbMenus[24]);
                                unset($dbMenus[26]);
                                unset($dbMenus[27]);
                                unset($dbMenus[500]);
                                unset($dbMenus[66]);
                                
                                // unset($dbMenus[15]); // Hostel
                                // unset($dbMenus[17]); // Announcement
                                // unset($dbMenus[19]); // Visitor info
                                // var_dump($dbMenus);
                                // die();
                                $menuDesign = '';
                                display_menu($dbMenus, $menuDesign);
                                // var_dump($menuDesign);
                                // die();
                                echo $menuDesign;
                            }
                        ?>

                    </ul>

                </section>
                <!-- /.sidebar -->
            </aside>
