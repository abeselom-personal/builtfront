<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{ asset('/public/frontend-v2/css/style.css') }}" />
<link rel="shortcut icon" href="{{ url('/favicon.ico') }}" type="image/x-icon">
<style>
    a.main_btn{
        line-height: 30px;
    }
    a.main_btn:hover{
        color: #fff;
    }
    a.custom_button_1{
        line-height: 30px;
        padding: .5rem 1.5rem;
    }
    @media (min-width: 768px) {
        .md\:w-\[350px\] {
            width: 350px;
        }
        .md\:w-\[220px\] {
            width: 220px;
        }
    }
    .mb-0{
        margin-bottom: 0;
    }
    .mb-50{
        margin-bottom: 50px;
    }
    #productDropdown a:hover{
        color: #fff;
    }
    .font-large{
        font-size: 1.25rem;
    }
</style>

@include('misc.global_head')