    <?php include 'functions.php'; ?>
        <h3>Events</h3>
        <hr>
    <div class="row">
    <div class="col-md-6">
             <div class="well event-list" style="position: relative;
    top: 5vh;">
                 <p class="lead">Add Events <i class="fas fa-calendar"></i></p>
                 
                 <label for="name"> Event:</label>
             <input type="text" name="event_name" id="event_name" class="form-control"  required/>
                 <label for="gender">Date Start:</label>
                <div class="input-group date" data-provide="datepicker">
                    <input type="text" class="form-control" id="event_start">
                    <div class="input-group-addon" >
                     <span class="far fa-calendar"></span>
                     </div>
                     </div>
                     <label for="gender">Date End:</label>
                    <div class="input-group date" data-provide="datepicker">
                    <input type="text" class="form-control" id="event_end">
                    <div class="input-group-addon" >
                     <span class="far fa-calendar"></span>
                     </div>
                     </div>
                     <label for="name">Time Start:</label>
             <input type="time" name="time_start" id="time_start" class="form-control"  required/>
             <label for="name">Time End:</label>
             <input type="time" name="time_end" id="time_end" class="form-control"  required/>
                <button id="add_event" class="btn btn-success btn-lg" style="position:relative; top:2vh;"><strong>Add Event</strong></button>
              </div>
            </div>
            <div class="col-md-6">
            <div class="well event-list" style="position: relative;
    top: 5vh;">
                    <?php include 'json.php'; ?>
                </div>
          </div>
          
    </div>

          
   </div>
   
</div>