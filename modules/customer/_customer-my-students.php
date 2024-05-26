<?php
$header_min = true;
$no_footer = true;
$use_bootstrap_icons = true;
require_once("customer-restrict.php");
require_once("../../inc/includes.php");
//require_once("../../inc/functions.php");
define('META_TITLE', 'Students');
define('META_DESCRIPTION', 'Students');
require_once("../../inc/header.php");
$getCustomer = $customers->getCustomer($_SESSION['id_customer']);
if($getCustomer->id){
    $get = $customers->getListBySchool($getCustomer->school);
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>



<section id="inner-page">
  <div class="container">
    <div class="row">
      <div class="col"><h3>Students</h3></div>
    </div>
  </div>
</section>


<section id="panel-area">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-3 col-lg-3">
        <?php require_once("_customer-sidebar.php");?>
      </div>
      <div class="col-12 col-sm-12 col-md-9 col-lg-9">
        <div class="white-card content-panel">
          <h4 class="mb-3"><?php echo $getCustomer->school; ?> Students</h4>

        </div>


          <div class="table-responsive">
              <table class="table table-striped border data-table align-middle">
                  <thead>
                  <tr>
                      <th scope="col">Name</th>
                      <th scope="col">E-mail</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Education</th>
                      <th scope="col">Messages</th>
                      <th scope="col">Threads</th>
                      <th scope="col">Credits</th>
                      <th scope="col" data-order-by="order-col">Registration date</th>
                      <th scope="col">Login as user</th>
                  </tr>
                  </thead>
                  <tbody id="sortableTableBody" data-module="<?php echo $module_name; ?>">
                  <?php foreach ($get as $show) {?>
                      <tr data-id="<?php echo $show->id; ?>">
                          <td><?php echo $show->name; ?></td>
                          <?php if($config->demo_mode){?>
                              <td><span class="badge bg-danger">Email will not be shown in demo mode</span></td>
                          <?php }else{ ?>
                              <td><?php echo $show->email; ?></td>
                          <?php } ?>
                          <td><?php echo $show->phone; ?></td>
                          <td><?php echo $show->education; ?></td>
                          <td><?php echo $show->total_messages; ?></td>
                          <td><?php echo $show->total_threads; ?></td>
                          <td><?php echo number_format($show->credits, 0, ',', '.'); ?></td>

                          <td><?php echo $show->created_at; ?></td>
                          <td><a target="_blank" href="<?php echo $base_url."/teacher/login/".$show->id; ?>" target="_blank" class="btn btn-primary btn-sm">
                                  <i class="bi bi-box-arrow-up-right"></i> Login as user</a></td>


                      </tr>
                  <?php } ?>
                  </tbody>
              </table>

          </div>

      </div>
    </div>
  </div>
</section>



<?php
require_once("../../inc/footer.php");
?>
