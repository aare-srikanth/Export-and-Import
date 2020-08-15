$( document ).ready(function(){
    $( '#upload_csv_file' ).submit(function(e){
        e.preventDefault();
        $.ajax({
            url: 'upload.php',
            type: 'post',
            data:   new FormData(this),
            contentType: false,
            processData: false,
            success: function(response){
                console.log(response);
               if(response == true){
                    window.location.reload();
               }else{
                   alert("Please Select CSV File.");
               }
            }
        });
    });

    setTimeout(function() {
        let alert = document.querySelector(".alert");
            alert.remove();
    }, 3000);

    
});