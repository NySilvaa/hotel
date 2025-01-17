<footer>
   <div class="container">
    <h2>Facilities</h2>
    <div class="box-facilities">
        <ul>
            <li><a href="#">Breakfast Included</a></li>
            <li><a href="#">Wi-fi Avaliable</a></li>
            <li><a href="#">Children Play Area</a></li>
        </ul>
    </div>
    <!-- /.box-facilities -->

    <div class="box-facilities">
        <ul>
            <li><a href="#">Free Parking</a></li>
            <li><a href="#">Gym</a></li>
            <li><a href="#">24-hour Reception</a></li>
        </ul>
    </div>
    <!-- /.box-facilities -->

    <div class="box-facilities">
        <ul>
            <li><a href="#">Ev Charging Avaliable</a></li>
            <li><a href="#">Swimming Pool</a></li>
        </ul>
    </div>
    <!-- /.box-facilities -->
   </div>
</footer>

<script defer src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<?php if(@$_GET['url'] == ''){ ?>
<script defer src="<?php echo PATH_INTERATIONS; ?>js/ajax.home.js"></script>
<script defer src="<?php echo PATH_INTERATIONS; ?>js/func.home.js"></script>
<?php } ?>

<?php if(@$_GET['url'] == 'rooms/'){ ?>
    <script defer src="<?php echo PATH_INTERATIONS; ?>js/func.rooms.js"></script>
<?php } ?>

<?php if(@$_GET['url'] == 'register/'){ ?>
    <script defer src="<?php echo PATH_INTERATIONS; ?>js/func.register.js"></script>
    <script defer src="<?php echo PATH_INTERATIONS; ?>js/ajax.register.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<?php } ?>

<?php if(@$_GET['url'] == "login/"){ ?>
    <script defer src="<?php echo PATH_INTERATIONS; ?>js/func.login.js"></script>
<?php } ?>

<?php if(@$_GET['url'] !== '' || @$_GET['url'] !== "home"){ ?>
    <script defer src="<?php echo PATH_INTERATIONS; ?>js/func.partner.js"></script>
<?php } ?>

</body>
</html>