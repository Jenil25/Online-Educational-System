<x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<body>
    <br>
    <div class="col mx-auto">
            <div class="card mx-auto" style="width: 23rem;">
                <img src="/{{ $course[0]->thumbnail }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> <b>{{ $course[0]->name }}</b> </h5>
                    <p class="card-text m-0 p-0"> {{ $course[0]->desc }} </p> 
                    <p class="price"> Original Price: ₹ {{ $course[0]->price }}</p>
                    <p class="price"> Discount: {{ $course[0]->discount }} %</p>
                    <p class="price"> Final Price: ₹ {{ $finalprice }}</p>
                    <b>Select Payment Mode:</b>
                    <form action="{{ route('payment',['id'=>$course[0]->id]) }}" method="POST">
                        @csrf
                        <center>GPay <input type="radio" name="paymentmode" value="GPay" required></center>
                        <br>
                        <center>Paytm <input type="radio" name="paymentmode" value="Paytm"></center>
                        <br>
                        <center>Card <input type="radio" name="paymentmode" value="Card"></center>
                        <div class="card-footer p-0 border-0">
                            <div class="row no-gutters p-1">
                                <div class="col"> <input type="submit" value="Continue"> </div>
                                </div>
                            </div> 
                        </div>
                    </form>
                </div>
    </div>
</body>
</html>


</x-app-layout>
