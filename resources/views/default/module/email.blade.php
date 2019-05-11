<h1 style="color:#000">Chúc mừng bạn đã đặt hàng thành công</h1>
<h3>Thông tin người nhận hàng: </h3>
<p style="color:#000"><b>Họ tên:</b> {{ $info['name'] }}</p>
<p style="color:#000"><b>Số điện thoại:</b> {{ $info['phone'] }}</p>
<p style="color:#000"><b>Email:</b> {{ $info['email'] }}</p>
<p style="color:#000"><b>Nội dung:</b> {{ $info['note'] }}</p>
<h3>Sản phẩm bạn đã đặt: </h3>
    <div class="table">
    <table style="border:1px solid #eee; width:600px">
        <tr class="active">
            <td>STT</td>
            <td>Tên sản phẩm</td>
            <td>Giá sản phẩm</td>
            <td>Số lượng</td>
            <td>Tổng</td>
        </tr>
        <?php $total = 0; ?>
        @if($data)
        <?php $stt=0; ?>
            @foreach($data as $value)
            <?php $stt++; ?>
                <tr>
                    <td>{{ $stt }}</td>
                    <td>{{ $value['name'] }}</td>
                    <td>{!! ($value['attributes']['promotion'] != 0) ? "<span='old_price'>".number_format($value['attributes']['old_price'])."</span> <span='promotion'>".number_format($value['attributes']['promotion'])."</span>" : number_format($value['attributes']['old_price']) !!}</td>
                    <td>{{ $value['quantity'] }}</td>
                    <td>{{ number_format($value['price'] * $value['quantity']) }}</td>
                </tr>
                @php
                    $total += $value['price'] * $value['quantity'];
                @endphp
            @endforeach
        @endif
    </table>
    </div>
    <div class="total_price col-sm-6"><b>Tổng tiền</b> {{ number_format($total) }}</div>
</div>
