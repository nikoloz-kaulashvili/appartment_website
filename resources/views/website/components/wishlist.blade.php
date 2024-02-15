@extends('website.index')
@section('content')
<div class="main">
    <div class="wishlist_page_bg">
        <div class="container">
            <div class="wishlist_area">   
               <div class="wishlist_inner">
                    <form action="#"> 
                        <div class="row">
                            <div class="col-12">
                                <div class="table_desc wishlist">
                                    <div class="cart_page">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="appartment_remove">Delete</th>
                                                    <th class="appartment_thumb">Image</th>
                                                    <th class="appartment_name">appartment</th>
                                                    <th class="appartment-price">Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($appartments as $appartment)
                                                    <tr class="wishlist-tr">
                                                        <td class="appartment_remove"> 
                                                            <button class="btn btn-primary delete-wishlist"  data-appartment-id="{{$appartment->id}}">X</button>
                                                        </td>
                                                        <td class="appartment_thumb"><a href="#"><img src="{{$appartment->image}}" alt=""></a></td>
                                                        <td class="appartment_name"><a href="#">{{$appartment->name_ge}}</a></td>
                                                        <td class="appartment-price">{{$appartment->price}} $</td>
                                                    </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>   
                                    </div>  

                                </div>
                             </div>
                         </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.delete-wishlist').click(function(){
            var token = $('meta[name="csrf-token"]').attr('content');
            var appartmentId = $(this).data('appartment-id'); // Retrieve appartment ID from data-appartment-id attribute
            var $row = $(this).closest('.wishlist-tr')
            $.ajax({
                type: 'GET', // Use DELETE method
                url: '/delete-from-cache/' + appartmentId,
                data: {
                        _token: token // Include the CSRF token
                    },
                success: function(response) {
                    console.log('appartment deleted from cache successfully');
                    Swal.fire("პროდუქტი წარმატებით წაიშალა");
                    $row.remove();
                },
                error: function(xhr, status, error) {
                    Swal.fire("მსგავსი პროდუქტი არ მოიძებნა");

                }
            });
        });
    });
</script>
@stop