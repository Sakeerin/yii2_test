<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-xs-6" align="left" >
        <?php  foreach($company as $key):?>
            Address : <?php echo $key['address'] ?><br/>
        <?php endforeach;?>
      </div>
      <div class="col-xs-4" align="left">
        <?php  foreach($company as $key):?>
          Call : <?php echo $key['phone_number'] ?><br/>
          Website : <?php echo $key['website'] ?><br/>
          E-mail : <?php echo $key['email'] ?><br/>
          Tax : <?php echo $key['tax'] ?>
        <?php endforeach;?>
      </div>
    </div>
  </div>
</div>
