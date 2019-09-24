<?php
    if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
        $row    =   $link->getAllRecords('products','*',' AND id="'.$_REQUEST['editId'].'"');
    }
     
    if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
        extract($_REQUEST);
        if($username==""){
            header('location:'.$_SERVER['PHP_SELF'].'?msg=un&amp;editId='.$_REQUEST['editId']);
            exit;
        }elseif($useremail==""){
            header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&amp;editId='.$_REQUEST['editId']);
            exit;
        }elseif($userphone==""){
            header('location:'.$_SERVER['PHP_SELF'].'?msg=up&amp;editId='.$_REQUEST['editId']);
            exit;
        }elseif($useremail==""){
            header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&amp;editId='.$_REQUEST['editId']);
            exit;
        }elseif($userphone==""){
            header('location:'.$_SERVER['PHP_SELF'].'?msg=up&amp;editId='.$_REQUEST['editId']);
            exit;
        }elseif($userphone==""){
            header('location:'.$_SERVER['PHP_SELF'].'?msg=up&amp;editId='.$_REQUEST['editId']);
            exit;
        $data   =   array(
                        'username'=>$username,
                        'useremail'=>$useremail,
                        'userphone'=>$userphone,
                        );
        $update =   $db->update('users',$data,array('id'=>$editId));
        if($update){
            header('location: browse-users.php?msg=rus');
            exit;
        }else{
            header('location: browse-users.php?msg=rnu');
            exit;
        }
    }
?>
    <div class="col-sm-6">
    <h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
    <form method="post">
        <div class="form-group">
            <label>Имя изображения <span class="text-danger">*</span></label>
            <input type="text" name="image" id="image" class="form-control" value="<?php echo $row[0]['image']; ?>" placeholder="Например: img1.jpg" required>
        </div>
        <div class="form-group"> 
                  <label>Название товара:<span class="text-danger">*</span></label>
                  <input type="text" name="title" id="title" class="form-control" value="<?php echo $row[0]['title']; ?>" placeholder="" required>
                </div>
                
                <div class="form-group"> 
                  <label>Цена (По умолчанию - Договорная):</label>
                  <input type="text" name="price" id="price" class="form-control" value="<?php echo $row[0]['price']; ?>" placeholder="Договорная" required>
                </div>
                
                <div class="form-group">
                  <label>Категория товара:<span class="text-danger">*</span></label>
                    <select class="form-control" name="type" id="type" value="<?php echo $row[0]['type']; ?>">
                      <option value="type1">Забор</option>
                      <option value="type2">Ворота</option>
                      <option value="type3">Калитка</option>
                      <option value="type4">Козырек</option>
                    </select> 
                </div>
                
                <div class="form-group"> 
                  <label>Описание товара:<span class="text-danger">*</span></label>
                  <textarea name="description" id="description" cols="1" rows="5" style="width:100%" value="<?php echo $row[0]['description']; ?>"></textarea>
                </div>
                
                <div class="form-group"> 
                  <label>Отобразить/Скрыть:<span class="text-danger">*</span></label>
                    <select class="form-control" name="visible" id="visible" value="<?php echo $row[0]['visible']; ?>"> 
                      <option value="vs1">Отобразить товар</option>
                      <option value="vs0">Скрыть товар</option>
                    </select>
                </div>
        <div class="form-group">
            <input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
            <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update User</button>
        </div>
    </form>
</div>
