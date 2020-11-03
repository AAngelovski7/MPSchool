<?php
include_once ('includes/DB.php');


if(isset($_POST['delete'])){
    $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);
    $sql = "DELETE FROM contacts WHERE id='".$id_to_delete."'";
    if(mysqli_query($conn,$sql)){
        header('Location: contacts.php');
    }else{
        echo "query error".mysqli_error($conn);
        header('Location:errorPage.php');
    }
}
?>
<?php include_once ('templates/header.php');?>

<section class="py-3 px-5 mb-4">
   <div class="row">
      <div class="col-lg-12">
         <table class="table table-striped table-hover">
            <thead class="thead-dark">
               <tr>
                  <th>Име</th>
                  <th>Емаил</th>
                  <th>Предмет</th>
                  <th>Порака</th>
                   <th>Избриши</th>
               </tr>
            </thead>
            <?php
            $sql = "SELECT * FROM contacts";
            $result = mysqli_query($conn,$sql);
            $contactsData = mysqli_fetch_all($result,MYSQLI_ASSOC);
            foreach ($contactsData as $contactData){ ?>
             <tbody>
                <tr>
                    <td><?php echo $contactData['name']?></td>
                    <td><?php echo $contactData['email']?></td>
                    <td style="height: 30px"> <div style="height:100%; overflow-y:scroll;"><?php echo $contactData['subject']?></div></td>
                    <td style="height: 30px" ><div style="height:100%; overflow-y:scroll;"><?php echo $contactData['message']?></div></td>
                    <td>
                        <form class="" action="contacts.php" method="post">
                            <input type="hidden" name="id_to_delete" value="<?php echo $contactData['id']; ?>" >
                            <button class="btn btn-danger text-light
                             mt-2 mb-3" type="submit" name="delete"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
             </tbody>

            <?php
            }?>
         </table>
      </div>
   </div>
</section>

<?php include_once ("templates/footer.php");?>
