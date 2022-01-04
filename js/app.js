//icon eye login
$(document).ready(function(){
    $('#eye').click(function(){
        $(this).toggleClass('show');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye')
        if($(this).hasClass('show')){
            $(this).prev().attr('type', 'test');
        }
        else{
            $(this).prev().attr('type', 'password');
        }
    });
});
// admin check account sinh vien
// function checksaveaccountsv(e){
//     e.preventDefault();
//     var pass = document.getElementById("password");
//     var ht = document.getElementById("hoten");
//     var ns = document.getElementById("ngaysinh");
//     var cccd = document.getElementById("cccd");
//     var diachi= document.getElementById("diachi");
//     var sdt = document.getElementById("sdt");
//     var email  = document.getElementById("email");
//     var khoahoc = document.getElementById("khoahoc");
//     var lop = document.getElementById("lop");
//     if(user.value == ""){
//         document.getElementById("erruser").innerHTML = "Tên khac rong";
//         user.style.background = "red";
        
//         }
//     else if(user.value !="" && password.value != "admin" ){
//         document.getElementById("errpass").innerHTML = "Mật khẩu là admin";
//         password.style.background = "red";
//         }
        
    
//     var form = document.getElementById('login-form');
//     form.addEventListener('submit', kiemtra, false);

// }
// $('.header a').on('click', function() {
//     //selecting the syllabus class
//       $select = $('<div class="syllabus"></div>');
//       $(this).parents('li').each(function(n, li) {
//          //Adding / to each anchor tag of li
//           $select.prepend(' > ',$(li).children('a').clone());
//       });
//     // Displaying the hierarchical order of pages.
//     $('.display').html(
//       $select.prepend('<a href="#syllabus">Home</a>'));   
// })



// $(document).ready(function() {
     
//     // Cấu hình các nhãn phân trang
//     $('#example').dataTable( {
//         "language": {
//         "sProcessing":   "Đang xử lý...",
//         "sLengthMenu":   "Xem _MENU_ mục",
//         "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
//         "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
//         "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
//         "sInfoFiltered": "(được lọc từ _MAX_ mục)",
//         "sInfoPostFix":  "",
//         "sSearch":       "Tìm:",
//         "sUrl":          "",
//         "oPaginate": {
//             "sFirst":    "Đầu",
//             "sPrevious": "Trước",
//             "sNext":     "Tiếp",
//             "sLast":     "Cuối"
//             }
//         }
//     } );
         
//     } ); 