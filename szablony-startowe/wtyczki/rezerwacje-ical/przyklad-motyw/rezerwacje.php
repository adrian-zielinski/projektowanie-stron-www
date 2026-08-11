<?php
/**
 * Blok rezerwacji: kalendarz dostępności (sync iCal z Booking.com) + formularz.
 * Używany na stronie głównej (sekcja) i na podstronie /rezerwacje/ (szablon).
 *
 * @var array $args ['tag' => 'h1'|'h2'] — poziom nagłówka zależny od kontekstu.
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

$tag        = ( isset( $args['tag'] ) && 'h1' === $args['tag'] ) ? 'h1' : 'h2';
$rez_status = isset( $_GET['rez'] ) ? sanitize_key( $_GET['rez'] ) : '';
?>
<section class="rez" id="rezerwacja">
	<div class="rez__in">
		<div class="sec-head">
			<div class="sec-head__l">
				<span class="eyebrow"><span class="eyebrow__line"></span> Rezerwacje</span>
				<<?php echo $tag; ?>>Sprawdź dostępność i zarezerwuj termin.</<?php echo $tag; ?>>
			</div>
			<p class="sec-head__r">Kalendarz łączy rezerwacje ze strony i z Booking.com — widzisz zawsze aktualną dostępność. Wybierz dzień początku i końca.</p>
		</div>

		<?php if ( 'ok' === $rez_status ) : ?>
			<p class="form-msg form-msg--ok">Dziękujemy! Rezerwacja dotarła i czeka na potwierdzenie — wysłaliśmy e-mail z podsumowaniem.</p>
		<?php elseif ( 'busy' === $rez_status ) : ?>
			<p class="form-msg form-msg--err">Wybrany termin został właśnie zajęty. Wybierz inne daty.</p>
		<?php elseif ( 'err' === $rez_status ) : ?>
			<p class="form-msg form-msg--err">Nie udało się zapisać rezerwacji. Sprawdź dane i spróbuj ponownie.</p>
		<?php endif; ?>

		<div class="rez__grid">
			<div class="rez__cal form-card" id="rez-cal" data-ajax="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
				<div class="rez__nav">
					<button type="button" class="rez__arrow" id="rez-prev" aria-label="Poprzedni miesiąc">&larr;</button>
					<strong id="rez-title">&nbsp;</strong>
					<button type="button" class="rez__arrow" id="rez-next" aria-label="Następny miesiąc">&rarr;</button>
				</div>
				<div class="rez__dow"><span>Pn</span><span>Wt</span><span>Śr</span><span>Cz</span><span>Pt</span><span>So</span><span>Nd</span></div>
				<div class="rez__days" id="rez-days" aria-live="polite"></div>
				<p class="rez__legend"><span class="rez__dot rez__dot--free"></span> wolne <span class="rez__dot rez__dot--busy"></span> zajęte <span class="rez__dot rez__dot--sel"></span> Twój wybór</p>
			</div>

			<div class="form-card">
				<div class="form-card__head">
					<h3>Dane rezerwacji</h3>
					<p>Wybierz daty w kalendarzu, uzupełnij dane — potwierdzimy mailowo.</p>
				</div>
				<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" id="rez-form">
					<input type="hidden" name="action" value="rez_book">
					<?php wp_nonce_field( 'rez_book', 'rez_nonce' ); ?>
					<input type="hidden" name="rez_start" id="rez-start">
					<input type="hidden" name="rez_end" id="rez-end">
					<div class="field">
						<label for="rez-range">Wybrany termin</label>
						<input type="text" id="rez-range" placeholder="Kliknij daty w kalendarzu" readonly required>
					</div>
					<div class="field">
						<label for="rez_name">Imię i nazwisko</label>
						<input id="rez_name" name="rez_name" type="text" placeholder="Jan Kowalski" required>
					</div>
					<div class="field">
						<label for="rez_email">Adres e-mail</label>
						<input id="rez_email" name="rez_email" type="email" placeholder="jan.kowalski@firma.pl" required>
					</div>
					<div class="field">
						<label for="rez_phone">Telefon (opcjonalnie)</label>
						<input id="rez_phone" name="rez_phone" type="tel" placeholder="+48 600 000 000">
					</div>
					<button type="submit" class="form-card__submit">Rezerwuję <span class="material-symbols-outlined">arrow_forward</span></button>
					<p class="form-card__note">Rezerwacja wymaga potwierdzenia — nic nie płacisz na tym etapie.</p>
				</form>
			</div>
		</div>
	</div>
</section>
