<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<table align="center" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;
  border-collapse: collapse; background: #fdfdfd; border:1px solid #E9E9E9; page-break-inside: avoid;" >
        <tbody><tr>
            <td>
                <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                    <tbody><tr>
                       
                        <td width="100%">
                            <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <td height="20"></td>
                                    <td height="20"></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 20px;line-height: 1;color: #111827;font-weight: bold;font-family: Helvetica, sans-serif;">
                                        Ulasan Tempahan</td>
                                        <td></td>
                                </tr>
                                <tr>
                                    <td height="30"></td>
                                    <td height="30"></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;line-height: 1;color: #13808C;font-weight: bold;font-family: Helvetica, sans-serif;">
                                        Maklumat Tempahan Bilik</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827;height:40px;">Nama Mesyuarat</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{$booking->meeting_name}}</span>
                                    </td>
                                    <td width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; height:40px;">Pengerusi</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{$booking->chairman}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Tarikh Mesyuarat</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">
                                            <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                <tbody>
                                                    <tr>
                                                        <td style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280; ">
                                                            Tarikh Mula
                                                        </td>
                                                         <td style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">
                                                           {{\Carbon\Carbon::parse($booking->start_date)->format('F d, Y')}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="10"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">
                                                            Tarikh Tamat
                                                        </td>
                                                         <td style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">
                                                            {{\Carbon\Carbon::parse($booking->end_date)->format('F d, Y')}}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </span>
                                    </td>
                                    <td width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Masa Mesyuarat</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">
                                            <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                <tbody>
                                                    <tr>
                                                        <td style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">
                                                            Masa Mula
                                                        </td>
                                                         <td style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">
                                                           {{\Carbon\Carbon::parse($booking->start_time)->format('h:i A')}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="10"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">
                                                            Masa Tamat
                                                        </td>
                                                         <td style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">
                                                            {{\Carbon\Carbon::parse($booking->end_time)->format('h:i A')}}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif; vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Bilangan Peserta</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{$booking->number_of_participants}} Orang</span>
                                    </td>
                                    <td width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Keterangan</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1.2;color: #6B7280;">{{$booking->description}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="15"></td>
                                    <td height="15"></td>
                                </tr>
                                <tr>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif; vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Bilik </p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{$booking->room->room_name}}</span>
                                    </td>
                                    <td width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Jenis </p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{$booking->type}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif; vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Status </p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{ $booking->status_name }}</span>
                                    </td>
                                    <td width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Jenis Ulangan </p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{$booking->repetition_type}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif; vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Tarikh Ulangan</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{\Carbon\Carbon::parse($booking->repeat_date)->format('F d, Y')}}</span>
                                    </td>
                                    <td width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Susun Atur / Pelan</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{$booking->room_plan}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="30"></td>
                                    <td height="30"></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;line-height: 1;color: #13808C;font-weight: bold;font-family: Helvetica, sans-serif;">
                                        Maklumat Pemohon</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif; vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Nama Pemohon</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{$booking->user->name}}</span>
                                    </td>
                                    <td width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Nama Kementerian / Bahagian / Jabatan</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{$booking->ministry}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif; vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Jawatan </p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;"> {{$booking->position}}</span>
                                    </td>
                                    <td width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Gred</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{$booking->gred}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif; vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">No. Telefon Pejabat</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;"> {{$booking->office}}</span>
                                    </td>
                                    <td width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">No. Telefon Bimbit</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{$booking->phone}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif; vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Emel</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;"> {{$booking->email}}</span>
                                    </td>
                                    <td></td>
                                    <!-- <td width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827;">No. Mobile Phone</p>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">012-345 6789</span>
                                    </td> -->
                                </tr>
                                <tr>
                                    <td height="30"></td>
                                    <td height="30"></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;line-height: 1;color: #13808C;font-weight: bold;font-family: Helvetica, sans-serif;">
                                        Secretariat Information</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif; vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Nama Sekretariat</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;"> {{$booking->secretariat_name ?? '-'}}</span>
                                    </td>
                                    <td width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">No. Telefon Pejabat</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{$booking->secretariat_office_phone ?? '-'}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif; vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">No. Telefon Bimbit</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;"> {{$booking->secretariat_mobile_phone ?? '-'}}</span>
                                    </td>
                                    <td width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Emel</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{$booking->secretariat_email ?? '-'}}</span>
                                    </td>
                                </tr>
                                 <tr>
                                    <td height="30"></td>
                                    <td height="30"></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;line-height: 1;color: #13808C;font-weight: bold;font-family: Helvetica, sans-serif;">
                                        Maklumat Tempahan Lain</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif; vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Makanan</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;"> {{ $booking->food ? 'Yes' : 'No' }}</span>
                                    </td>
                                    <td width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Peralatan</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{ is_array($booking->equipment) ? implode(', ', $booking->equipment) : implode(', ', json_decode($booking->equipment, true)) }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif; vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Nama Katering</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;"> {{ $booking->catering_name ?? '-'}}</span>
                                    </td>
                                    <td width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">No. Telefon</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{ $booking->catering_phone ?? '-'}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif; vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Keperluan Lain</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;"> {{ $booking->other_requirements ? 'Yes' : 'No' }}</span>
                                    </td>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif; vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">No. Kereta</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;"> {{ $booking->car_number ?? '-' }}</span>
                                    </td>
                                    {{-- <td width="50%" style="display: none; font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Perkhidmatan Teknikal</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{$booking->technical_services ? 'Yes' : 'No'}} </span>
                                    </td> --}}
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr >
                                    {{-- <td width="50%" style="display: none; font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Perkhidmatan ICT</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{$booking->ict_services ? 'Yes' : 'No'}} </span>
                                    </td> --}}
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif; vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Kemas Kini Maklumat</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1.2;color: #6B7280;"> {{$booking->reviews}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20"></td>
                                    <td height="20"></td>
                                </tr>
                            </tbody>
                        </table>
                        </td>
                    
                   
                    </tr>
                </tbody></table>
            </td>
        </tr>
       
    </tbody></table>

</body>
</html>
