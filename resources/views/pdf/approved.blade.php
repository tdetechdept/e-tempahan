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
                                        Booking Review</td>
                                        <td></td>
                                </tr>
                                <tr>
                                    <td height="30"></td>
                                    <td height="30"></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;line-height: 1;color: #13808C;font-weight: bold;font-family: Helvetica, sans-serif;">
                                        Room Booking Information</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827;height:40px;">Meeting Name</p>
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
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; height:40px;">Chairman</p>
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
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Meeting Date</p>
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
                                                            Start Date
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
                                                            End Date
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
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Meeting Time</p>
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
                                                            Start Time
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
                                                            End Time
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
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Number of Participants</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{$booking->number_of_participants}} People</span>
                                    </td>
                                    <td width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Description</p>
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
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Room </p>
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
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Type </p>
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
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Repetition Type </p>
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
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Repeat Date</p>
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
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Layout/Plan</p>
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
                                        Applicant Information</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif; vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Applicant Name</p>
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
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Name of Ministry / Division / Department</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{$booking->user->department}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif; vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Position </p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;"> {{$booking->user->position}}</span>
                                    </td>
                                    <td width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Grade</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{$booking->user->grade}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif; vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">No. Office Phone</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;"> {{$booking->user->office_number}}</span>
                                    </td>
                                    <td width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">No. Mobile Phone</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{$booking->user->phone_number}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif; vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Email</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;"> {{$booking->user->email}}</span>
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
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Secretariat Name</p>
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
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">No. Office Phone</p>
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
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">No. Mobile Phone</p>
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
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Email</p>
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
                                        Other Booking Information</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif; vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Food</p>
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
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Equipment</p>
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
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Catering Name</p>
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
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">No. Telephone</p>
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
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Other Needs (Car)</p>
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
                                    <td width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Technical Services</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{$booking->technical_services ? 'Yes' : 'No'}} </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif;vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">ICT services</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="font-weight: normal;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #6B7280;">{{$booking->ict_services ? 'Yes' : 'No'}} </span>
                                    </td>
                                    <td  width="50%" style="font-size: 12px;line-height: 1;color: #111827;font-weight: normal;font-family: Helvetica, sans-serif; vertical-align: text-top;">
                                        <p style="font-weight: bold;font-family: Helvetica, sans-serif;font-size: 12px;line-height: 1;color: #111827; margin-bottom:8px;">Update Information</p>
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
