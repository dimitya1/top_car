<?php

namespace App\Services;

use App\Http\Requests\Feedback\StoreFeedbackRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramService
{
    public function sendMessage(StoreFeedbackRequest $request)
    {
        $botName = config('topcar.telegram.token');
        $chatName = config('topcar.telegram.chat_name');

        $message = self::prepareMessage($request);
        $url = "https://api.telegram.org/bot$botName/sendMessage?chat_id=$chatName
            &parse_mode=HTML&text=$message";

        $response = Http::get($url);
        $response = json_decode($response, true);

        if (!$response['ok']) {
            $date = now();
            Log::info("*** start of bad response from Telegram $date ***");
            Log::info('ok: ' . $response->ok());
            Log::info('status: ' . $response->status());
            Log::info('json: ' . $response->json());
            Log::info('body: ' . $response->body());
            Log::info("*** end of bad response from Telegram $date ***");
            Log::info(PHP_EOL);
        }
    }

    private function prepareMessage(StoreFeedbackRequest $request): string
    {
        $message = '';
        if (auth()->user()) {
            //todo change route
            $userRoute = route('admin.users.index');
            $message .= "<a href='$userRoute'>Авторизированный пользователь</a> только что оставил обратную связь через форму на сайте." . PHP_EOL;
        } else {
            $message .= 'Неавторизированный пользователь только что оставил обратную связь через форму на сайте.' . PHP_EOL;
        }
        $message .= "<b>Имя, указанное автором:</b> $request->name" . PHP_EOL;
        $message .= "<b>Текст сообщения:</b> $request->message" . PHP_EOL;
        if ($request->email && $request->phone_number) {
            $message .= "<b>Связаться можно по номеру</b> <i>$request->phone_number</i>" . PHP_EOL;
            $message .= "<b>Или через email:</b> <a href='mailto:$request->email'>$request->email</a>" . PHP_EOL;
        } elseif ($request->email) {
            $message .= "<b>Связаться можно по номеру:</b> <i>$request->phone_number</i>" . PHP_EOL;
        } elseif ($request->phone_number) {
            $message .= "<b>Связаться можно через email:</b> <a href='mailto:$request->email'>$request->email</a>" . PHP_EOL;
        }

        $message = urlencode($message);

        return $message;
    }
}
