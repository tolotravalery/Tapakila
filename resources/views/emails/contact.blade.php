
<style>
    @media only screen and (max-width: 600px) {
        .inner-body {
            width: 100% !important;
        }

        .footer {
            width: 100% !important;
        }
    }
    #globcontent {
        background-color: white;
        margin-top: 84px;
        padding: 20px 30px 20px 30px;
        overflow: hidden;
        margin-bottom: 83px;
        border-radius: 3px;
    }
    .mim{
        border-bottom: 1px solid black;
        padding-bottom: 2px;
    }

</style>
<body style="background-color:#eeeeee;">
<table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
            <table class="content" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="body" width="100%" cellpadding="0" cellspacing="0">
                        <table class="inner-body" align="center" width="900" cellpadding="0" cellspacing="0">
                            <tr>
                                <td class="content-cell">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div style="background-color: white;margin-top: 84px;padding: 20px 30px 20px 30px;overflow: hidden;margin-bottom: 83px;border-radius: 3px;">
                                                <div class="row">
                                                    <div class="col-md-10 col-md-offset-1">
                                                        <div style=" border-bottom: 1px solid black; padding-bottom: 2px;">
                                                            Message from : {{ $message_from_name }} ({{$message_from_mail}})
                                                        </div>
                                                        {!! $message_corps !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>