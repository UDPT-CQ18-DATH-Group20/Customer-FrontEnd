$(document).ready(function() {
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var order_id = button.data('id')
        var modal = $(this)
        console.log(recipient,order_id)
        modal.find('.modal-body').empty()
        recipient.forEach(element => {
            if(!element.is_comment){
                modal.find('.modal-body').append(`
                <form class="post-comment"  onSubmit="return false;" action="/index.php?controller=manager&action=create-comment" method="post">
                    <div class="product-name">
                        ${element.name}
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="order_id" id="order_id"  value="${order_id}"/>
                        <input type="hidden" name="goods_id" id="goods_id" value="${element.goods_id}"/>
                        <input type="number" name="star" id="star" class="rating text-warning"
                            data-clearable="remove" value="5" />
                        <input type="text" name="comment" class="form-control" id="recipient-name">
                        <button type="submit" class="btn btn-primary">Đánh giá</button>
                    </div>
                </form>
                <hr>
                `)
            }
                
        });
        modal.find('.modal-body').append(`
        <script src="https://use.fontawesome.com/5ac93d4ca8.js"></script>
        <script src="js/bootstrap4-rating-input.js"></script>   
        `)
        $(".post-comment").submit(function (e) {
          // Prevent form submission which refreshes page
          var current = $(this)
          e.preventDefault();
          // Serialize data
          var formData = $(this).serialize();
          $.ajax({
            url:"/index.php?controller=manager&action=create-comment",
            method:"post",
            data: formData,
            success: function(data) {
                // display success message
                alert("Thêm thành công")
                current.remove();
            },
          })
      }) 
    })
    
})