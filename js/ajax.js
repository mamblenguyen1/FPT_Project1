    // $(document).ready(function(){
    //     $("a.link-header").click(function(){
    //         var url = this.href;
    //         $("main#kq").load(url);
    //         return false;
    //     }
    //     )

    // })
// $(document).ready(function(){    
//     $.ajax({
//         url: "http://fptproject1/admin/resources/product/category.php",       
//         dataType:'json',         
//         success: function(data){     
//             $("#category").html("");
//             for (i=0; i<data.length; i++){            
//                 var category = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
//                 var str = ` 
//                 <option selected="selected" value="${category['category_id']}"> ${category['category_name']} </option>
//                    `;
//                 $("#category").append(str);
//             }
//             $("#category").on("change", function(e) { layHuyen();  });
//         }
//     });
// })
