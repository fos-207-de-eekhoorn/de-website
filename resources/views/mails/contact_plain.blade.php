{{ $subject }}

Naam
{{ $contact_form->naam }}

Email
{{ $contact_form->email }}

Bericht
{{ $contact_form->bericht }}

Is deze persoon actief in onze scouts?
{{ $contact_form->actief }}

{{ ($contact_form->kind_naam) ? 'Naam van kind:' : NULL }}
{{ ($contact_form->kind_naam) ? $contact_form->kind_naam : NULL }}

{{ ($contact_form->kind_tak) ? 'Tak van kind:' : NULL }}
{{ ($contact_form->kind_tak) ? $contact_form->kind_tak : NULL }}


Met vriendelijke groet,
Het automatisch mail system van jullie website

You're having issues? Email me:
orry@tradler.co