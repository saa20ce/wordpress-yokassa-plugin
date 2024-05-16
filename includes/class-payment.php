<?php

    class Payment {

        public function process_payment($amount) {
            // Логика обработки платежа

            // Возврат результата обработки
            return true;
        }

        public function get_payment_status($payment_id) {
            // Получение статуса платежа

            // Возврат статуса
            return 'paid';
        }

    }
