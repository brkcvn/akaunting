<div class="print-template">
    @stack('details_start')
    <table style="width: 100%;">
        <tr>
            <td style="padding:0 0 15px 0;">
                <h2 class="text-left" style="font-size: 14px; font-weight:600;">
                    {{ trans_choice('transfers.details', 2) }}
                </h2>
            </td>
        </tr>
    </table>

    <table>
        @stack('transferred_at_input_start')
        <tr>
            <td valign="top" style="width: 30%; margin: 0px; padding: 8px 0 8px 0; font-size: 12px; font-weight:600; border-bottom:1px solid #adadad;">
                {{ trans('general.date') }}
            </td>

            <td valign="top" style="width:70%; margin: 0px; padding: 8px 0 8px 0; font-size: 12px; border-bottom:1px solid #adadad;">
                <x-date date="{{ $transfer->expense_transaction->paid_at}}" />
            </td>
        </tr>
        @stack('transferred_at_input_end')

        @stack('payment_method_input_start')
        <tr>
            <td valign="top" style="width: 30%; margin: 0px; padding: 8px 0 8px 0; font-size: 12px; font-weight:600; border-bottom:1px solid #adadad;">
                {{ trans_choice('general.payment_methods', 1) }}
            </td>

            <td valign="top" style="width:70%; margin: 0px; padding: 8px 0 8px 0; font-size: 12px; border-bottom:1px solid #adadad;">
                @if (! empty($payment_methods[$transfer->expense_transaction->payment_method]))
                    {!! $payment_methods[$transfer->expense_transaction->payment_method] !!}
                @else
                    <x-empty-data />
                @endif
            </td>
        </tr>
        @stack('payment_method_input_end')

        @stack('reference_input_start')
        <tr>
            <td valign="top" style="width: 30%; margin: 0px; padding: 8px 0 8px 0; font-size: 12px; font-weight:600; border-bottom:1px solid #adadad;">
                {{ trans('general.reference') }}
            </td>

            <td valign="top" style="width:70%; margin: 0px; padding: 8px 0 8px 0; font-size: 12px; border-bottom:1px solid #adadad;">
                {{ $transfer->expense_transaction->reference }}
            </td>
        </tr>
        @stack('reference_input_end')

        @stack('description_input_start')
        <tr>
            <td valign="top" style="width: 30%; margin: 0px; padding: 8px 0 8px 0; font-size: 12px; font-weight:600; border-bottom:1px solid #adadad;">
                {{ trans('general.description') }}
            </td>

            <td valign="top" style="width:70%; margin: 0px; padding: 8px 0 8px 0; font-size: 12px; border-bottom:1px solid #adadad;">
                {{ $transfer->expense_transaction->description }}
            </td>
        </tr>
        @stack('description_input_end')
    </table>
    @stack('details_end')

    @stack('from_account_start')
    <table style="width: 100%; margin-top:35px;">
        <tbody>
            @stack('from_account_id_start')
            <tr>
                <td class="border-bottom-1 border-top-1" style="width: 60%; padding: 15px 0 15px 0;">
                    <h2 class="mb-1" style="font-size: 14px; font-weight:600; margin-bottom: 15px;">
                        {{ trans('transfers.from_account') }}
                    </h2>

                    <table>
                        @stack('from_account_name_input_start')
                        <tr>
                            <td style="width:30%; margin: 0px; padding: 0 0 8px 0; font-size: 12px; font-weight:600;">
                                {{ trans('accounts.account_name') }}
                            </td>

                            <td style="width:70%; margin: 0px; padding: 0 0 8px 0; font-size: 12px;">
                                {{ $transfer->expense_account->name }}
                            </td>
                        </tr>
                        @stack('from_account_name_input_end')
                    </table>

                    <table>
                        @stack('from_account_number_input_start')
                        <tr>
                            <td style="width:30%; margin: 0px; padding: 0 0 8px 0; font-size: 12px; font-weight:600;">
                                {{ trans('accounts.number') }}
                            </td>

                            <td style="width:70%; margin: 0px; padding: 0 0 8px 0; font-size: 12px;">
                                {{ $transfer->expense_account->number}}
                            </td>
                        </tr>
                        @stack('from_account_number_input_end')
                    </table>

                    @if (! empty($transfer->expense_account->bank_name))
                    <table>
                        @stack('from_account_bank_name_input_start')
                        <tr>
                            <td style="width:30%; margin: 0px; padding: 0 0 8px 0; font-size: 12px; font-weight:600;">
                                {{ trans('accounts.bank_name') }}
                            </td>

                            <td style="width:70%; margin: 0px; padding: 0 0 8px 0; font-size: 12px;">
                                {{ $transfer->expense_account->bank_name }}
                            </td>
                        </tr>
                        @stack('from_account_bank_name_input_end')
                    </table>
                    @endif

                    @if (! empty($transfer->expense_account->bank_phone))
                    <table>
                        @stack('from_account_phone_input_start')
                        <tr>
                            <td style="width:30%; margin: 0px; padding: 0 0 8px 0; font-size: 12px; font-weight:600;">
                                {{ trans('general.phone') }}
                            </td>

                            <td style="width:70%; margin: 0px; padding: 0 0 8px 0; font-size: 12px;">
                                {{ $transfer->expense_account->bank_phone }}
                            </td>
                        </tr>
                        @stack('from_account_phone_input_end')
                    </table>
                    @endif

                    @if (! empty($transfer->expense_account->bank_address))
                    <table>
                        @stack('from_account_address_input_start')
                        <tr>
                            <td style="width:30%; margin: 0px; padding: 0 0 8px 0; font-size: 12px; font-weight:600;">
                                {{ trans('general.address') }}
                            </td>

                            <td style="width:70%; margin: 0px; padding: 0 0 8px 0; font-size: 12px;">
                                {{ $transfer->expense_account->bank_address }}
                            </td>
                        </tr>
                        @stack('from_account_address_input_end')
                    </table>
                    @endif
                </td>
            </tr>
            @stack('from_account_id_end')
        </tbody>
    </table>
    @stack('from_account_end')

    @stack('to_account_start')
    <table style="width: 100%; margin-top:15px;">
        <tbody>
            @stack('to_account_id_start')
            <tr>
                <td style="width: 60%; padding: 0 0 15px 0;">
                    <h2 class="mb-1" style="font-size: 14px; font-weight:600; margin-bottom: 15px;">
                        {{ trans('transfers.to_account') }}
                    </h2>

                    <table>
                        @stack('to_account_name_input_start')
                        <tr>
                            <td style="width:30%; margin: 0px; padding: 0 0 8px 0; font-size: 12px; font-weight:600;">
                                {{ trans('accounts.number') }}
                            </td>

                            <td style="width:70%; margin: 0px; padding: 0 0 8px 0; font-size: 12px;">
                                {{ $transfer->income_account->name }}
                            </td>
                        </tr>
                        @stack('to_account_name_input_end')
                    </table>

                    <table>
                        @stack('to_account_number_input_start')
                        <tr>
                            <td style="width:30%; margin: 0px; padding: 0 0 8px 0; font-size: 12px; font-weight:600;">
                                {{ trans('accounts.number') }}
                            </td>

                            <td style="width:70%; margin: 0px; padding: 0 0 8px 0; font-size: 12px;">
                                {{ $transfer->income_account->number }}
                            </td>
                        </tr>
                        @stack('to_account_number_input_end')
                    </table>

                    @if (! empty($transfer->income_account->bank_name))
                    <table>
                        @stack('to_account_bank_name_input_start')
                        <tr>
                            <td style="width:30%; margin: 0px; padding: 0 0 8px 0; font-size: 12px; font-weight:600;">
                                {{ trans('accounts.bank_name') }}
                            </td>

                            <td style="width:70%; margin: 0px; padding: 0 0 8px 0; font-size: 12px;">
                                {{ $transfer->income_account->bank_name }}
                            </td>
                        </tr>
                        @stack('to_account_bank_name_input_end')
                    </table>
                    @endif

                    @if (! empty($transfer->income_account->bank_phone))
                    <table>
                        @stack('to_account_phone_input_start')
                        <tr>
                            <td style="width:30%; margin: 0px; padding: 0 0 8px 0; font-size: 12px; font-weight:600;">
                                {{ trans('general.phone') }}
                            </td>

                            <td style="width:70%; margin: 0px; padding: 0 0 8px 0; font-size: 12px;">
                                {{ $transfer->income_account->bank_phone }}
                            </td>
                        </tr>
                        @stack('to_account_phone_input_end')
                    </table>
                    @endif

                    @if (! empty($transfer->income_account->bank_address))
                    <table>
                        @stack('to_account_address_input_start')
                        <tr>
                            <td style="width:30%; margin: 0px; padding: 0 0 8px 0; font-size: 12px; font-weight:600;">
                                {{ trans('general.address') }}
                            </td>

                            <td style="width:70%; margin: 0px; padding: 0 0 8px 0; font-size: 12px;">
                                {{ $transfer->income_account->bank_address }}
                            </td>
                        </tr>
                        @stack('to_account_address_input_end')
                    </table>
                    @endif
                </td>
            </tr>
            @stack('to_account_id_end')
        </tbody>
    </table>
    @stack('to_account_end')

    @stack('amount_start')
    <table style="text-align: right;">
        @stack('amount_table_start')
        <tr>
            <td valign="center" style="width:80%; display:block; float:right;">
                <table>
                    @stack('amount_input_start')
                    <tr>
                        <td valign="center" style="width: 80%; padding:0; font-size: 14px; font-weight:600;">
                            {{ trans('general.amount') }}
                        </td>

                        <td valign="center" style="width: 20%; padding:0; font-size: 14px;">
                            <x-money :amount="$transfer->expense_transaction->amount" :currency="$transfer->expense_transaction->currency_code" convert />
                        </td>
                    </tr>
                    @stack('amount_input_end')
                </table>
            </td>
        </tr>
        @stack('amount_table_end')
    </table>
    @stack('amount_end')
</div>
