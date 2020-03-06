<div class="payment-footer-container">

    <div class="payment-footer-inner-container">
        <p>You are currently using the free version to, you can have up to 5 patients top upgrade go <a href="{{route('user.profile')}}">here:</a></p>
        <form method="POST" action="{{route('payment.footer')}}">
            @method('POST')
            @csrf
            <button type="submit">Dont show anymore</button>
        </form>
    </div>
</div>
