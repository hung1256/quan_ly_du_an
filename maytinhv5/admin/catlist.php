﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php' ?>
<?php
    $cat = new category();
     if(isset($_GET['delid'])){
        $id = $_GET['delid']; 
        $delcat = $cat->del_category($id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách danh mục</h2>
                <div class="block">    
                <?php

                if(isset($delcat)){
                    echo $delcat;
                }

                ?>    
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>No.</th>
							<th>Tên danh mục</th>
							<th>Hình ảnh</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$show_cate = $cat->show_category();
						if($show_cate){
							$i = 0;
							while($result = $show_cate->fetch_assoc()){
								$i++;
							
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['catName'] ?></td>
							<td><img src="uploads/<?php echo $result['image'] ?>" width="80"></td>
							<td><a href="catedit.php?catid=<?php echo $result['catId'] ?>">Sửa</a> || <a onclick = "return confirm('Are you want to delete?')" href="?delid=<?php echo $result['catId'] ?>">Xoá</a></td>
						</tr>
						<?php
					}
						}
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

