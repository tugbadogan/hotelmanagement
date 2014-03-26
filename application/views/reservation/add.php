<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="span4">
        <a href="/customer/add/reservation" class="btn btn-success btn-large">Add Customer</a>

        <div class="account-container">
          
          <div class="content">
            
            <form action="/reservation/check" method="post">
            
              <h1>Search for Rooms</h1>    
<? if(isset($error)) {?>
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Error!</strong> <?=$error?>
      </div>
<? } ?>
<? if(isset($success)) {?>
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Success!</strong> <?=$success?>
      </div>
<? } ?>
      <div class="add-fields">

        <div class="field">
          <label for="customer_TCno">Customer TC no:</label>
          <input type="text" id="customer_TCno" name="customer_TCno" required value="" placeholder="Customer ID no"/>
        </div> <!-- /field -->

        <div class="field">
          <label for="room_type">Room Type:</label>
          <select id="room_type" name="room_type">
          <?
            foreach ($room_types as $k=>$rt) {
              ?>
              <option value="<?=$rt->room_type?>" <? if($k==0) { echo "selected"; } ?>><?=$rt->room_type?></option>
              <?
            }
          ?>
         </select>
        </div> <!-- /field -->
        
        <div class="field">
          <label for="checkin_date">Check-in Date:</label>
          <input type="date" id="checkin_date" name="checkin_date" required value=""/>
        </div> <!-- /field -->

        <div class="field">
          <label for="checkout_date">Check-out Date:</label>
          <input type="date" id="checkout_date" name="checkout_date" required value=""/>
        </div> <!-- /field -->

        <!--div class="field">
          <label for="room_quantity">Quantity:</label>
          <input type="number" min="1" id="quantity" name="quantity" value="" placeholder="Quantity"/>
        </div--> <!-- /field -->

      </div> <!-- /login-fields -->
      
      <div class="login-actions">
        
        <button class="button btn btn-success btn-large">List Available</button>
        
      </div> <!-- .actions -->
      
      
      
    </form>
    
  </div> <!-- /content -->
</div> <!-- /account-container -->
</div>
<style type="text/css">.account-container{margin-top: 10px;padding-bottom: 15px;}</style>
      <div class="span7">
        <!-- /widget -->
        <div class="widget widget-nopad">
          <div class="widget-header"> <i class="icon-list-alt"></i>
            <h3> Reservation</h3>
          </div>
          <!-- /widget-header -->
          <div class="widget-content">
            <div id='calendar' class='calendar'>
            </div>
          </div>
          <!-- /widget-content --> 
        </div>
        <!-- /widget -->
      </div>
    </div>
  </div>
</div>
