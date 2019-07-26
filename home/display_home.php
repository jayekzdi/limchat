    <div class="row">
            <div class="col-md-6">
                <div class="well event-list" >
                    <?php  include 'urgent_interval.php';
                    include 'json.php';
                    if(isset($_SESSION["reciever_user"])){
                unset($_SESSION["reciever_user"]);
                    }?>
                </div>
          </div>
          <div class="col-md-5">
             <div class="well event-list" >
                 <p class="lead text-center"><i class="fas fa-bullhorn" style="font-size:1.5em;"></i>ANNOUNCEMENTS</p>
                 <div class="btn-group btn-group-xs" role="group" id="btn-prio">
                    <button class="btn btn-info ann-filter"  data-target="all" id="filter-all">All</button>
                    <button class="btn btn-default ann-filter" data-target="low" id="filter-low">Low</button>
                    <button class="btn btn-warning ann-filter" data-target="normal" id="filter-normal">Normal</button>
                    <button class="btn btn-danger ann-filter" data-target="urgent" id="filter-urgent">Urgent</button>
                 </div>
                    <div id="page-announce"></div>
              </div>
            </div>
    </div>
    <div class="modal" id="view-announcement" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">View Announcement <i class="fas fa-bullhorn"></i></h4>
        </div>
        <div class="modal-body" id="view_post">
 </div>
      </div>
      
    </div>
  </div>
