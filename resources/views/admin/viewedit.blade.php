<div>
<form action="{{ url('editncc') }}" class="was-validated" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <table>
          <tr>
            <td style="width:400px">
                <p>name</p>
                <input type="text" placeholder="nhập tên" value="{{ $data->name }}" name="name">
                
                <p>số điện thoại</p>
                <input type="text" placeholder="nhập sdt" value="{{ $data->sdt }}" name="sdt">
                
                <p>số sân có</p>
                <input type="text" placeholder="nhập sdt" value="{{ $data->sosan }}" name="sosan">
                <p>phường</p>
                <select name = "dc">
                  @foreach($diachi as $dc)  
                    @if($dc->madc == $data->madc)                    
                    <option value="{{ $dc->madc }}" selected>{{ $dc->tendc }}</option>
                    @else
                    <option value="{{ $dc->madc }}">{{ $dc->tendc }}</option>
                    @endif
                  @endforeach
                </select>
                <input type="hidden" value="{{ $data->idncc }}" name="idncc">
            </td>
            <td>
                <p>địa chỉ cụ thể</p>
                <input type="text" placeholder="nhập địa chỉ" value="{{ $data->address }}" name="address">
                
                <p>giá tiền</p>
                <input type="text" placeholder="nhập giá tiền" value="{{ $data->giatien }}" name="giatien">

                <p>img</p>
                <input type="file" placeholder="nhập file" value="{{ $data->name }}" name="img">
            </td>
            <td>
                <input type="submit" value="confim">
            </td>
          </tr>
        </table>
</form>
</td>