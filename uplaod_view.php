<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<form action="upload.php">  
<table>
       <tr>
             <td nowrap="nowrap"> VAT Paper <font color="#FF0000">*</font></td>
             <td>
                <!--<input type="file" name="file_mouza_map" id="file_mouza_map"  value="<?=$file_mouza_map?>" class="form-control-static" >-->
                
                  <link href="Simple-Ajax-Uploader-master/assets/css/styles.css" rel="stylesheet">
             
                  <!--<div class="container">-->                               
                      <div class="row" style="padding-top:10px;">
                        <div class="col-xs-2">
                          <input type="file" id="uploadBtn1"  value="Choose File" <?php if(empty($vat_file)){echo "required";} ?>>
                        </div>
                        <div class="col-xs-10">
                      <div id="progressOuter1" class="progress progress-striped active" style="display:none;">
                        <div id="progressBar1" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        </div>
                      </div>
                        </div>
                      </div>
                      <div class="row" style="padding-top:10px;">
                        <div class="col-xs-10">
                          <div id="msgBox1">
                          </div>
                        </div>
                      </div>
                  <!--</div>-->
                  <?php
                     if(isset($Id)) {
                       $url = 'file_upload.php?id='.$Id;
                    }
                    else {
                        $url = 'file_upload.php';
                        }
                  ?>
            
                <script src="Simple-Ajax-Uploader-master/SimpleAjaxUploader.js"></script>
                <script>
                function escapeTags( str ) {
                  return String( str )
                           .replace( /&/g, '&amp;' )
                           .replace( /"/g, '&quot;' )
                           .replace( /'/g, '&#39;' )
                           .replace( /</g, '&lt;' )
                           .replace( />/g, '&gt;' );
                }
                
                $(document).ready(function() {
                 
                  var btn1 = document.getElementById('uploadBtn1'),
                      progressBar1 = document.getElementById('progressBar1'),
                      progressOuter1 = document.getElementById('progressOuter1'),
                      msgBox1 = document.getElementById('msgBox1');
                
                  var uploader1 = new ss.SimpleUpload({
                        button: btn1,
                        url: '<?=$url?>',
                        sessionProgressUrl: 'Simple-Ajax-Uploader-master/code/sessionProgress.php',
                        //name: 'uploadfile',
                        name:'vat_file', 
                        multipart: true,
                        hoverClass: 'hover',
                        focusClass: 'focus',
                        responseType: 'json',
                        startXHR: function() {
                            progressOuter1.style.display = 'block'; // make progress bar visible           
                            this.setProgressBar( progressBar1 );           
                        },
                        onSubmit: function() {
                            msgBox1.innerHTML = ''; // empty the message box
                            btn1.innerHTML = 'Uploading...'; // change button text to "Uploading..."
                          },
                        onComplete: function( filename, response ) {
                            //btn.innerHTML = 'Choose Another File';
                            $("#uploadBtn1").removeAttr('required');
                            btn1.innerHTML = 'Choose File';
                            progressOuter1.style.display = 'none'; // hide progress bar when upload is completed
                
                            if ( !response ) {
                                msgBox1.innerHTML = 'Unable to upload file';
                                return;
                            }
                
                            if ( response.success === true ) {
                                msgBox1.innerHTML = '<strong>' + escapeTags( filename ) + '</strong>' + ' successfully uploaded.';
                
                            } else {
                                if ( response.msg )  {
                                    msgBox1.innerHTML = escapeTags( response.msg );
                
                                } else {
                                    msgBox1.innerHTML = 'An error occurred and the upload failed.';
                                }
                            }
                          },
                        onError: function() {
                            progressOuter1.style.display = 'none';
                            msgBox1.innerHTML = 'Unable to upload file';
                          }
                    });
                    
                  
                });
                </script>
                
                 <?php 
                  if(empty($vat_file))
                  {
                    echo "Is file uploaded?  No";
                  }
                 else
                 {
                   echo "Is file uploaded? Yes";
                 }
                ?>	<br />
                
                <code><font color="#993333">[N.B. Supported file extension is pdf,png,jpg,jpeg. Example file.jpg]</font></code>
          </td>
     </tr>
     <tr>
         <td nowrap="nowrap"  width="54%">No Objection Certificate (NOC) <font color="#FF0000">*</font></td>
         <td>
            <!--<input type="file" name="file_approval_doc" id="file_approval_doc"  value="<?=$file_approval_doc?>" class="form-control-static" >-->
            <!--<div class="container">-->                               
                  <div class="row" style="padding-top:10px;">
                    <div class="col-xs-2">
                      <input type="file" id="uploadBtn2"  value="Choose File"   <?php //if(empty($noc_file)){echo "required";} ?>>
                    </div>
                    <div class="col-xs-10">
                  <div id="progressOuter2" class="progress progress-striped active" style="display:none;">
                    <div id="progressBar2" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    </div>
                  </div>

                    </div>
                  </div>
                  <div class="row" style="padding-top:10px;">
                    <div class="col-xs-10">
                      <div id="msgBox2">
                      </div>
                    </div>
                  </div>
              <!--</div>-->
              <?php
                 if(isset($Id)) {
                   $url = 'file_upload.php?id='.$Id;
                }
                else {
                    $url = 'file_upload.php';
                    }
              ?>
            <script>
              // window.onload = function() {
            $(document).ready(function() {

                      
              var btn2 = document.getElementById('uploadBtn2'),
                  progressBar2 = document.getElementById('progressBar2'),
                  progressOuter2 = document.getElementById('progressOuter2'),
                  msgBox2 = document.getElementById('msgBox2');
            
              var uploader2 = new ss.SimpleUpload({
                    button: btn2,
                    url: '<?=$url?>',
                    sessionProgressUrl: 'Simple-Ajax-Uploader-master/code/sessionProgress.php',
                    //name: 'uploadfile',
                    name:'noc_file', 
                    multipart: true,
                    hoverClass: 'hover',
                    focusClass: 'focus',
                    responseType: 'json',
                    startXHR: function() {
                        progressOuter2.style.display = 'block'; // make progress bar visible           
                        this.setProgressBar( progressBar2 );           
                    },
                    onSubmit: function() {
                        msgBox2.innerHTML = ''; // empty the message box
                        btn2.innerHTML = 'Uploading...'; // change button text to "Uploading..."
                      },
                    onComplete: function( filename, response ) {
                        //btn.innerHTML = 'Choose Another File';
                        $("#uploadBtn2").removeAttr('required');
                        btn2.innerHTML = 'Choose File';
                        progressOuter2.style.display = 'none'; // hide progress bar when upload is completed
            
                        if ( !response ) {
                            msgBox2.innerHTML = 'Unable to upload file';
                            return;
                        }
            
                        if ( response.success === true ) {
                            msgBox2.innerHTML = '<strong>' + escapeTags( filename ) + '</strong>' + ' successfully uploaded.';
            
                        } else {
                            if ( response.msg )  {
                                msgBox2.innerHTML = escapeTags( response.msg );
            
                            } else {
                                msgBox2.innerHTML = 'An error occurred and the upload failed.';
                            }
                        }
                      },
                    onError: function() {
                        progressOuter2.style.display = 'none';
                        msgBox2.innerHTML = 'Unable to upload file';
                      }
                });
             
            });
            </script>
            <?php 
              if(empty($noc_file))
              {
                echo "Is file uploaded?  No";
              }
             else
             {
               echo "Is file uploaded? Yes";
             }
            ?>	<br />
            <code><font color="#993333">[N.B. Supported file extension is pdf,png,jpg,jpeg. Example file.jpg]</font></code>
         </td>
     </tr> 
     <tr>
          <td>
            Name
          </td>
          <td>
             <input type="text" name="name" value="">
          </td>
     </tr>   
     
     <tr>
          <td>
            
          </td>
          <td>
             <input type="submit" value="Submit">
          </td>
     </tr>                        
</table>   
</form>      


<?php
          include("connection.php");
        $sql = "SELECT * from files ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			$arr = array();
			$i = 0;
			while ($data = mysqli_fetch_assoc($result)) {
				while (list ($key, $value) = each($data))
					$arr[$i][$key] = $value;
				$i ++;
			}
		}
		
 for($i=0;$i<count($arr);$i++)
 {
	
	?>
	   <?=$arr[$i]['name']?><img src="<?=$arr[$i]['vat_file']?>"><img src="<?=$arr[$i]['noc_file']?>">
	<?php
 }
?>













