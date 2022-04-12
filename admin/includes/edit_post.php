<?php getEditPosts(); ?>

<form action="" method="post" enctype="multipart/form-data">    
     
     
      <div class="form-group">
         <label for="title">Post Title</label>
          <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
      </div>

      <div class="form-group">
          
        <label for=''>Choose Category</label>
        <select class="form-control" name="select_categories" id="">
            <?php selectPostCategory(); ?>
        </select>

      </div>
      
     <div class="form-group">
         <label for="title">Post Author</label>
         <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author">
     </div>
     
    <div class="form-group">
         <label for="post_status">Post Status</label>
         <!-- <input value="<?php //echo $post_status; ?>" type="text" class="form-control" name="post_status"> -->
         <select name="post_status" class="form-control" id="post_status">
            <option selected value="<?php echo "$post_status"; ?>"><?php echo "$post_status"; ?></option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
        </select>
     </div>
     
    <div class="form-group">
        <img width="100" src="../images/<?php echo $post_image; ?>" alt="no image">
        <input type="file" name="image">
    </div>
   
     <div class="form-group">
         <label for="post_tags">Post Tags</label>
         <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
     </div>
      
      <div class="form-group">
         <label for="post_content">Post Content</label>
         <textarea id="summernote" name="post_content" cols="30" rows="10" class="form-control"><?php echo $post_content; ?></textarea>
     </div>
     
     <div class="form-group">
     
     <input type="submit" class="btn btn-primary" name="edit_post" value="Update">
     
     </div>
     
     
     
</form>