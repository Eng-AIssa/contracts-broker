<html lang="en">

<head>
    <title>{{__('Contract')}}</title>
    <style>

        /* General */
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: darkgray;
        }

        .container {
            width: 75%;
            margin: auto;
            border: 2px solid #4a8cf7;
            padding: 20px;
            background-image: url("/draft7.png");
            background-color: white;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1);
        }

        image {
            opacity: 0.6;
        }

        h1 {
            text-align: center;
            color: #4a8cf7;
            font-size: 36px;
        }

        h3 {
            margin-top: 40px;
        }

        p {
            color: #000000;
        }

        table {
            width: 100%;
            background: ghostwhite;
            table-layout: fixed;
        }

        th,
        td {
            padding: 10px;
        }

        th {
            background-color: #4a8cf7;
            color: white;
        }

        td {
            border-bottom: 1px solid #4a8cf7;
            word-wrap: break-word;
        }

        @media screen and (max-width: 600px) {

            table,
            tr,
            td {
                display: block;
                width: auto;
            }

            td:before {
                content: attr(data-label);
                font-weight: bold;
                display: inline-block;
                width: 100px;
                background-color: #4a8cf7;
                color: white;
                padding: 5px;
                margin-right: 10px;
                vertical-align: top;
            }
        }

        /* Use flexbox to arrange the groups */
        .group {
            display: flex;
        }

        .group > div {
            flex-basis: 50%;
        }

        .group > div:first-child {
            margin-right: 20px;
        }

        .group > div:last-child {
            margin-left: 20px;
        }


        /* Form Design */

        .flex-center-column {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .flex-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-background {
            background-color: #d5caca73;
        }

        .form-background:hover {
            background-color: #c2a9a9;
        }

        input[type='checkbox'] {
            cursor: pointer;
        }

        ::placeholder {
            text-align: center;
        }

        .submit input {
            border: 2px black solid;
            border-radius: 3px;
            height: 32px;
            width: 300px;
            margin-right: 70px;
        }


        .button {
            display: inline-block;
            border-radius: 4px;
            background-color: #4a8cf7;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 15px;
            padding: 9px 20px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-right: 25px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
        }
    </style>


</head>

<body>
<div class="container">
    <h1>Contract</h1>

    <!-- Group the table by contract information, owner information and resident information -->

    <div class="group">
        <div>
            <h2>{{ __('Owner Information')}} </h2>
            <table>
                <tr>
                    <th>{{ __('Name')}} </th>
                    <th>{{ __('Phone')}} </th>
                    <th>{{ __('Email')}} </th>
                    <th>{{ __('Id Number')}} </th>
                </tr>
                <tr>
                    <td data-label="Name">{{$contract->owner->name}}</td>
                    <td data-label="Phone">{{$contract->owner_phone}}</td>
                    <td data-label="Email">{{$contract->owner_email}}</td>
                    <td data-label="Id Number">{{$contract->owner_id_number}}</td>
                </tr>
            </table>
        </div>

        <div>
            <h2>{{ __('Resident Information')}} </h2>
            <table>
                <tr>
                    <th> {{ __('Name')}} </th>
                    <th> {{ __('Email')}} </th>
                    <th> {{ __('Id Number')}} </th>
                    <th> {{ __('Nationality')}} </th>
                </tr>
                <tr>
                    <td data-label="Name">{{$contract->resident_name}}</td>
                    <td data-label="Email">{{$contract->resident_email}}</td>
                    <td data-label="Id Number">{{$contract->resident_id_number}}</td>
                    <td data-label="Nationality">{{$contract->resident_nationality}}</td>
                </tr>
            </table>
        </div>
    </div>

    <h2>{{ __('Contract Information')}} </h2>
    <table>
        <tr>
            <th>{{ __('Contract Id')}} </th>
            <th>{{ __('Unit Code')}} </th>
            <th>{{ __('Entry Date')}} </th>
            <th>{{ __('Leaving Date')}} </th>
            <th>{{ __('Fees')}} </th>
            <th>{{ __('Status')}} </th>
        </tr>
        <tr>
            <td data-label="Contract Id">{{$contract->id}}</td>
            <td data-label="Unit Code">{{$contract->unit->code}}</td>
            <td data-label="Entry Date">{{$contract->entry_date}}</td>
            <td data-label="Leaving Date">{{$contract->leaving_date}}</td>
            <td data-label="Fees">{{$contract->rental_fees}}</td>
            <td data-label="Status">{{$contract->status}}</td>
        </tr>
    </table>


    <h3>{{__('Terms & Conditions')}}</h3>
    <ul>
        <li>
            <p>{{__('This contract is valid and binding upon the parties and their successors and assigns')}}.</p>
        </li>
        <li>
            <p>{{__('Signed by:')}}</p>
        </li>

        <li>
            <p>{{__("Owner's Name and Date")}}</p>
        </li>

        <li>
            <p>{{__("Client's Name and Date")}}</p>
        </li>
        <li>
            <p>{{__("Please print and sign this contract and return it to the owner")}}.</p>
        </li>
        <li>
            <p>{{__("Resident must attend at the time & Leave at the time")}}.</p>
        </li>
        <li>
            <p>{{__("Noise is not at allowed at any situation & others should be respected")}}</p>
        </li>
        <li>
            <p>{{__("Only 2 cars are allowed, if more cars shows they will not be allowed")}}</p>
        </li>
    </ul>

    @if($contract->isPending())
        <form method="post" action="{{route('contract.confirm', $contract->id)}}" class="flex-center-column"
              style=" margin-top: 50px">
            @csrf
            <div class="form-background" style=" padding: 10px;">

                <x-input-error :messages="$errors->get('terms_and_conditions')" style="color: red; font-weight: bold"/>
                <x-input-error :messages="$errors->get('otp')" style="color: red; font-weight: bold"/>
                <x-input-error :messages="$errors->get('fail')" style="color: red; font-weight: bold"/>

                <div class="flex-center">
                    <input required id="terms-and-conditions" name="terms_and_conditions" type="checkbox"
                           style="height: 25px; width: 25px; margin-right: 10px;">
                    <h5> {{__('Accept terms & conditions')}}</h5>
                </div>
                <div class="flex-center submit">
                    <label for="otp" style="padding: 15px; ">{{("OTP")}}:</label>
                    <input required name="otp" placeholder="OTP"/>
                </div>
                <div class="flex-center">
                    <button type="submit" class="button" style="vertical-align:middle">
                        <span>{{('Submit')}} </span>
                    </button>
                </div>
            </div>
        </form>
    @endif
</div>

</body>

</html>
