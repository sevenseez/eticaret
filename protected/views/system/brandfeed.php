<?php 
$criteria = new EMongoCriteria;
$criteria->select(array('brand_name'));
$criteria->_id('==',$data['marka_id']);
$brand_name = Brand::model()->find($criteria);
$brand_name = $brand_name->brand_name;
?>

<li>
    <a href=""> 
        <span class="pull-right">
            <?php echo '('.$data['count'].')';?>
        </span>
            <?php echo $brand_name?>
    </a>
</li>

<?php ?>