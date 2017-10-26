<?php

//Returns translation
function __t($string = null, $context = null) {
	$general_translations = general_translations();
	$translated_string = '';
	//Loop through translations
	foreach ($general_translations as $translation) {
		//Translation has context
		if (!empty($context)) {
			if ($translation['en'] == $string && $translation == $context) {
				$translated_string = $translation[Application::this()->current_lang];
				break;
			}
		} //No context
		else {
			if ($translation['en'] == $string) {
				$translated_string = $translation[Application::this()->current_lang];
				break;
			}
		}
	}
	if (empty($translated_string)){
		return $string;
	}
	return $translated_string;
}

//Echoes translation
function _t($string = null, $context = null) {
	echo __t($string, $context);
}

function general_translations() {
	$general_translations = array(
		array(
			'fr' => 'Langues',
			'en' => 'Languages',
			'de' => 'Sprache',
			'es' => 'Idioma',
			'pt' => 'Língua',
			'context' => '',
		),
		array(
			'en' => 'Select a topic',
			'fr' => 'Choisissez une catégorie',
			'de' => 'Wähle eine Kategorie',
			'es' => 'Elige una categoría',
			'pt' => 'Escolha uma categoria',
			'context' => '',
		),
		array(
			'en' => 'Choose a category',
			'fr' => 'Choisissez une catégorie',
			'de' => 'Wähle eine Kategorie',
			'es' => 'Elige una categoría',
			'pt' => 'Escolha uma categoria',
			'context' => '',
		),
		array(
			'en' => 'French',
			'fr' => 'Français',
			'de' => 'Französisch',
			'es' => 'Francés',
			'pt' => 'Francês',
			'context' => '',
		),
		array(
			'en' => 'English',
			'fr' => 'Anglais',
			'de' => 'Englisch',
			'es' => 'Inglés',
			'pt' => 'Inglês',
			'context' => '',
		),
		array(
			'en' => 'German',
			'fr' => 'Allemand',
			'de' => 'Deutsch',
			'es' => 'Alemán',
			'pt' => 'Alemão',
			'context' => '',
		),
		array(
			'en' => 'Spanish',
			'fr' => 'Espagnol',
			'de' => 'Spanisch',
			'es' => 'Español',
			'pt' => 'Espanhol',
			'context' => '',
		),
		array(
			'en' => 'Portuguese',
			'fr' => 'Portugais',
			'de' => 'Portugiesisch',
			'es' => 'Portugués',
			'pt' => 'Português',
			'context' => '',
		),
		array(
			'en' => 'tot',
			'fr' => 'fr/tot',
			'de' => 'de/tot',
			'es' => 'es/tot',
			'pt' => 'pt/tot',
			'context' => '',
		),
		array(
			'en' => "It's time to make a choice",
			'fr' => 'Il est temps de faire un choix',
			'de' => 'Es ist Zeit, eine Entscheidung zu treffen',
			'es' => 'Es hora de hacer una elección',
			'pt' => 'É hora de fazer uma escolha',
			'context' => '',
		),
		array(
			'en' => "Get Started",
			'fr' => "C'est parti",
			'de' => 'Sich aufmachen',
			'es' => 'Comienza',
			'pt' => 'Iniciar',
			'context' => '',
		),
		array(
			'en' => "Try to make a choice",
			'fr' => 'Essayez de faire un choix',
			'de' => 'Versuchen Sie, eine Wahl zu treffen',
			'es' => 'Intenta hacer una elección',
			'pt' => 'Tente fazer uma escolha',
			'context' => '',
		),
		array(
			'en' => "Retry till you win",
			'fr' => "Réessayez jusqu'à la victoire",
			'de' => 'Versuchen Sie, bis Sie gewinnen',
			'es' => 'Vuelve a intentar hasta que ganes',
			'pt' => 'Tente novamente até ganhar',
			'context' => '',
		),
		array(
			'en' => "Latest Categories",
			'fr' => 'Dernières Catégories',
			'de' => 'Neueste Kategorien',
			'es' => 'Últimas categorías',
			'pt' => 'Categorias mais recentes',
			'context' => '',
		),
		array(
			'en' => "See all categories",
			'fr' => 'Voir toutes les catégories',
			'de' => 'Alle Kategorien anzeigen',
			'es' => 'Ver todas las categorías',
			'pt' => 'Veja todas as categorias',
			'context' => '',
		),
		array(
			'en' => "About",
			'fr' => 'À propos',
			'de' => 'Über',
			'es' => 'Acerca de',
			'pt' => 'Sobre',
			'context' => '',
		),
		array(
			'en' => "Any idea ?",
			'fr' => 'Une idée ?',
			'de' => 'Irgendeine Idee?',
			'es' => 'Alguna idea?',
			'pt' => 'Alguma idéia?',
			'context' => '',
		),
		array(
			'en' => "Share it with us",
			'fr' => 'Partagez-là avec nous',
			'de' => 'Teilen Sie es mit uns',
			'es' => 'Compártelo con nosotros',
			'pt' => 'Compartilhe conosco',
			'context' => '',
		),
		array(
			'en' => "All rights reserved",
			'fr' => 'Tous droits réservés',
			'de' => 'Alle Rechte vorbehalten',
			'es' => 'Todos los derechos reservados',
			'pt' => 'Todos os direitos reservados',
			'context' => '',
		),
		array(
			'en' => "All topics",
			'fr' => 'Toutes les catégories',
			'de' => 'Alle Kategorien',
			'es' => 'Todas las categorias',
			'pt' => 'Todas as categorias',
			'context' => '',
		),
		array(
			'en' => "Start",
			'fr' => 'Commencer',
			'de' => 'Anfang',
			'es' => 'Comienzo',
			'pt' => 'Começar',
			'context' => '',
		),
		array(
			'en' => "Start again",
			'fr' => 'Recommencer',
			'de' => 'Starten wieder',
			'es' => 'Empezar de nuevo',
			'pt' => 'Começar de novo',
			'context' => '',
		),
		array(
			'en' => "or",
			'fr' => 'ou',
			'de' => 'oder',
			'es' => 'o',
			'pt' => 'ou',
			'context' => '',
		),
		array(
			'en' => "beer",
			'fr' => 'bière',
			'de' => 'bier',
			'es' => 'cerveza',
			'pt' => 'cerveja',
			'context' => '',
		),
		array(
			'en' => "pee",
			'fr' => 'pisse',
			'de' => 'pullern',
			'es' => 'orina',
			'pt' => 'urina',
			'context' => '',
		),
		array(
			'en' => "Beer or Pee",
			'fr' => 'Bière ou Pisse',
			'de' => 'Bier oder Pullern',
			'es' => 'Cerveza o Orina',
			'pt' => 'Cerveja ou Urina',
			'context' => '',
		),
		array(
			'en' => "man",
			'fr' => 'homme',
			'de' => 'mann',
			'es' => 'hombre',
			'pt' => 'homem',
			'context' => '',
		),
		array(
			'en' => "woman",
			'fr' => 'femme',
			'de' => 'frau',
			'es' => 'mujer',
			'pt' => 'mulher',
			'context' => '',
		),
		array(
			'en' => "Man or Woman",
			'fr' => 'Homme ou Femme',
			'de' => 'Mann oder Frau',
			'es' => 'Hombre o Mujer',
			'pt' => 'Homem ou Mulher',
			'context' => '',
		),
		array(
			'en' => "muslim",
			'fr' => 'musulman',
			'de' => 'muslimisch',
			'es' => 'musulmán',
			'pt' => 'muçulmano',
			'context' => '',
		),
		array(
			'en' => "jewish",
			'fr' => 'juif',
			'de' => 'jüdisch',
			'es' => 'judío',
			'pt' => 'judeu',
			'context' => '',
		),
		array(
			'en' => "Muslim or Jewish",
			'fr' => 'Musulman ou Juif',
			'de' => 'Muslimisch oder Jüdisch',
			'es' => 'Musulmán o Judío',
			'pt' => 'Muçulmano ou Judeu',
			'context' => '',
		),
		array(
			'en' => "Michael Jackson or Not",
			'fr' => 'Michael Jackson ou Non',
			'de' => 'Michael Jackson oder Nicht',
			'es' => 'Michael Jackson o No',
			'pt' => 'Michael Jackson ou Não',
			'context' => '',
		),
		array(
			'en' => "not michael jackson",
			'fr' => 'non michael jackson',
			'de' => 'nicht michael jackson',
			'es' => 'no michael jackson',
			'pt' => 'não michael jackson',
			'context' => '',
		),
		array(
			'en' => "Nazi or Not Nazi",
			'fr' => 'Nazi ou Pas',
			'de' => 'Nazi oder Nicht',
			'es' => 'Nazi o No',
			'pt' => 'Nazista ou Não',
			'context' => '',
		),
		/*array(
			'en' => "",
			'fr' => '',
			'de' => '',
			'es' => '',
			'pt' => '',
			'context' => '',
		),*/

	);
	return $general_translations;
}
