<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class ExternalReplyInfo extends Data
{
    /**
     * This object contains information about a message that is being replied to, which may come from another chat or forum topic.
     * @link https://core.telegram.org/bots/api#externalreplyinfo
     *
     * @param MessageOrigin $origin https://core.telegram.org/bots/api#externalreplyinfo
     * @param Chat|Optional $chat Optional. Chat the original message belongs to. Available only if the chat is a supergroup or a channel.
     * @param int|Optional $messageId Optional. Unique message identifier inside the original chat. Available only if the original chat is a supergroup or a channel.
     * @param LinkPreviewOptions|Optional $linkPreviewOptions Optional. Options used for link preview generation for the original message, if it is a text message
     * @param Animation|Optional $animation Optional. Message is an animation, information about the animation
     * @param Audio|Optional $audio Optional. Message is an audio file, information about the file
     * @param Document|Optional $document Optional. Message is a general file, information about the file
     * @param PhotoSize[]|Optional $photo Optional. Message is a photo, available sizes of the photo
     * @param Sticker|Optional $sticker Optional. Message is a sticker, information about the sticker
     * @param Story|Optional $story Optional. Message is a forwarded story
     * @param Video|Optional $video Optional. Message is a video, information about the video
     * @param VideoNote|Optional $videoNote Optional. Message is a video note, information about the video message
     * @param Voice|Optional $voice Optional. Message is a voice message, information about the file
     * @param bool|Optional $hasMediaSpoiler Optional. True, if the message media is covered by a spoiler animation
     * @param Contact|Optional $contact Optional. Message is a shared contact, information about the contact
     * @param Dice|Optional $dice Optional. Message is a dice with random value
     * @param Game|Optional $game Optional. Message is a game, information about the game.
     * @param Giveaway|Optional $giveaway Optional. Message is a scheduled giveaway, information about the giveaway
     * @param GiveawayWinners|Optional $giveawayWinners Optional. A giveaway with public winners was completed
     * @param Invoice|Optional $invoice Optional. Message is an invoice for a payment, information about the invoice.
     * @param Location|Optional $location Optional. Message is a shared location, information about the location
     * @param Poll|Optional $poll Optional. Message is a native poll, information about the poll
     * @param Venue|Optional $venue Optional. Message is a venue, information about the venue
     */
    public function __construct(
        public MessageOrigin               $origin,
        public Chat|Optional               $chat,
        public int|Optional                $messageId,
        public LinkPreviewOptions|Optional $linkPreviewOptions,
        public Animation|Optional          $animation,
        public Audio|Optional              $audio,
        public Document|Optional           $document,
        /** @var array<int, PhotoSize> */
        public array|Optional              $photo,
        public Sticker|Optional            $sticker,
        public Story|Optional              $story,
        public Video|Optional              $video,
        public VideoNote|Optional          $videoNote,
        public Voice|Optional              $voice,
        public bool|Optional               $hasMediaSpoiler,
        public Contact|Optional            $contact,
        public Dice|Optional               $dice,
        public Game|Optional               $game,
        public Giveaway|Optional           $giveaway,
        public GiveawayWinners|Optional    $giveawayWinners,
        public Invoice|Optional            $invoice,
        public Location|Optional           $location,
        public Poll|Optional               $poll,
        public Venue|Optional              $venue,
    )
    {
    }
}
