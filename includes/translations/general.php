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

function _tl($string = null, $lang = null) {
	echo __tl($string, $lang);
}

function _tlink($url = null, $lang){
	if (isset($url) && !empty($url)){
		$parsed = parse_url($url);
		switch($parsed['host']){
			case 'localhost':
				$t = preg_replace('/\/this-or-this/', '', $parsed['path']);
				$t = preg_replace('/(\/fr)|(\/de)|(\/en)|(\/es)|(\/pt)/', '', $t);
				if (isset($lang) && !empty($lang)){
					return 'http://'.$parsed['host'].'/this-or-this/'.$lang.$t;
				}
				else {
					return 'http://'.$parsed['host'].'/this-or-this'.$t;
				}
				break;
			default :
				$t = preg_replace('/(\/fr)|(\/de)|(\/en)|(\/es)|(\/pt)/', '', $parsed['path']);
				if (isset($lang) && !empty($lang)){
					return 'http://'.$parsed['host'].'/'.$lang.$t;
				}
				else {
					return 'http://'.$parsed['host'].$t;
				}

				break;
		}
	}
	return null;
}

function __tl($string = null, $lang = null) {
	if (!isset($lang) || empty($lang)){
		$lang = Application::this()->current_lang;
	}
	$general_translations = general_translations();
	$translated_string = '';
	//Loop through translations
	foreach ($general_translations as $translation) {
		//Translation has context
		if (!empty($context)) {
			if ($translation['en'] == $string && $translation == $context) {
				$translated_string = $translation[$lang];
				break;
			}
		} //No context
		else {
			if ($translation['en'] == $string) {
				$translated_string = $translation[$lang];
				break;
			}
		}
	}
	if (empty($translated_string)){
		return $string;
	}
	return $translated_string;
}

function _l($lang){
	switch ($lang){
		case 'en':
			return 'English';
		case 'fr':
			return 'Français';
		case 'de':
			return "Deutsch";
		case 'es':
			return 'Español';
		case 'pt':
			return 'Português';
		default :
			return null;
	}
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
			'en' => "localhost/this-or-this",
			'fr' => "localhost/this-or-this/fr",
			'de' => "localhost/this-or-this/de",
			'es' => "localhost/this-or-this/es",
			'pt' => "localhost/this-or-this/pt",
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
			'fr' => 'Michael Jackson ou Pas',
			'de' => 'Michael Jackson oder Nicht',
			'es' => 'Michael Jackson o No',
			'pt' => 'Michael Jackson ou Não',
			'context' => '',
		),
		array(
			'en' => "not michael jackson",
			'fr' => 'pas michael jackson',
			'de' => 'nicht michael jackson',
			'es' => 'no michael jackson',
			'pt' => 'não michael jackson',
			'context' => '',
		),
		array(
			'en' => "not nazi",
			'fr' => 'pas nazi',
			'de' => 'nicht nazi',
			'es' => 'no nazi',
			'pt' => 'não nazi',
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
		array(
			'en' => "Share",
			'fr' => 'Partager',
			'de' => 'Auf Facebook teilen',
			'es' => 'Compartir',
			'pt' => 'Compartilhar',
			'context' => '',
		),
		array(
			'en' => "You seem to be lost",
			'fr' => 'Il semblerait que vous soyez perdu',
			'de' => 'Du scheinst verloren zu sein',
			'es' => 'Pareces perdido',
			'pt' => 'Você parece estar perdido',
			'context' => '',
		),
		array(
			'en' => "Back to homepage",
			'fr' => "Retour à l'accueil",
			'de' => 'Zurück zur Startseite',
			'es' => 'Volver a la página de inicio',
			'pt' => 'Voltar à página inicial',
			'context' => '',
		),
		array(
			'en' => "An idea",
			'fr' => 'Une idée',
			'de' => '',
			'es' => '',
			'pt' => '',
			'context' => '',
		),
		array(
			'en' => "The futur",
			'fr' => 'Le futur',
			'de' => '',
			'es' => '',
			'pt' => '',
			'context' => '',
		),
		array(
			'en' => "is born from a pretty dumb idea, the simple fact to recognize a picture, just by seing a part of it.",
			'fr' => "est né d'une idée toute bête, le simple fait de pouvoir reconnaître une image, juste en en voyant une partie.",
			'de' => '',
			'es' => '',
			'pt' => '',
			'context' => '',
		),
		array(
			'en' => "On social medias, this idea has been used by some pages, by it was very poorly handled, or not good enough to be attractive.",
			'fr' => 'Sur les réseaux sociaux déjà, cette idée était reprise par quelques pages, mais elle était très mal exploitée, ou pas assez.',
			'de' => '',
			'es' => '',
			'pt' => '',
			'context' => '',
		),
		array(
			'en' => "Very fast, our team got the idea to use two themes that we can relate to each other, and which are difficult to differentiate with only a part of the picture. We finally made <b>This or This</b>, the website on which you are at this moment.",
			'fr' => "Rapidement, notre équipe a eu l'idée d'utiliser deux thèmes que l'on peut mettre en commun, et qui sont difficilement différenciables avec seulement une partie de l'image. Nous avons finalement crée <b>This or This</b>, le site sur lequel vous êtes en ce moment.",
			'de' => '',
			'es' => '',
			'pt' => '',
			'context' => '',
		),
		array(
			'en' => "For now, the <b>This of This</b> team is working on the creation of new categories, and is dealing with bug fixes all over the website.",
			'fr' => "Pour le moment, l'équipe de <b>This or This</b> se consacre à la création de nouvelles catégories, et à la correction de bug sur le site.",
			'de' => '',
			'es' => '',
			'pt' => '',
			'context' => '',
		),
		array(
			'en' => "In the future, many features will be implemented, but it is still necessary that the concept works. For that, nothing more simple, you just need to share a maximum This or This with your friends on the social networks.",
			'fr' => "À l'avenir, de nombreuses fonctionnalités vont être implémentées, mais encore faut-il que le concept fonctionne. Pour ça, rien de plus simple, il vous suffit de partager un maximum This or This avec vos amis sur les réseaux sociaux.",
			'de' => '',
			'es' => '',
			'pt' => '',
			'context' => '',
		),
		array(
			'en' => "If you have a theme idea for a future category, or a new concept to propose, you can tell us via the form provided for this purpose, or via our social networks.",
			'fr' => "Si vous avez une idée de thème pour une future catégorie, ou un nouveau concept à proposer, vous pouvez nous en faire part via le formulaire prévu à cet effet, ou via nos réseaux sociaux.",
			'de' => '',
			'es' => '',
			'pt' => '',
			'context' => '',
		),
		array(
			'en' => "What is",
			'fr' => "Qu'est ce que",
			'de' => 'Was ist',
			'es' => 'Que es',
			'pt' => 'O que é',
			'context' => '',
		),
		array(
			'en' => "Want to be part of it ?",
			'fr' => "Envie d'en faire partie ?",
			'de' => 'Willst du dabei sein ?',
			'es' => '¿ Quieres ser parte de eso ?',
			'pt' => 'Quer ser parte disso ?',
			'context' => '',
		),
		array(
			'en' => "/about",
			'fr' => '/fr/about',
			'de' => '/de/about',
			'es' => '/es/about',
			'pt' => '/pt/about',
			'context' => '',
		),
		array(
			'en' => "Contact",
			'fr' => 'Contact',
			'de' => 'Kontakt',
			'es' => 'Contacto',
			'pt' => 'Contato',
			'context' => '',
		),
		array(
			'en' => "An idea to share or just a need to contact us, it is right here.",
			'fr' => "Une idée à partager ou tout simplement un besoin de nous contacter, c'est par ici.",
			'de' => 'Eine Idee zu teilen oder nur ein Bedürfnis, uns zu kontaktieren, ist hier.',
			'es' => 'Una idea para compartir o simplemente una necesidad de contactarnos, está aquí.',
			'pt' => 'Uma idéia para compartilhar ou apenas uma necessidade de entrar em contato conosco, está aqui.',
			'context' => '',
		),
		array(
			'en' => "Send",
			'fr' => "Envoyer",
			'de' => "Senden",
			'es' => "Mandar",
			'pt' => "Enviar",
			'context' => '',
		),
		array(
			'en' => "Please enter a valid email",
			'fr' => "Veuillez entrer une adresse email valide",
			'de' => "Bitte geben Sie eine gültige E-Mail-Adresse ein",
			'es' => "Por favor ingrese una dirección de correo electrónico válida",
			'pt' => "Digite um endereço de e-mail válido",
			'context' => '',
		),
		array(
			'en' => "Doggo or Marshmallow",
			'fr' => "Chien ou Marshmallow",
			'de' => "Hund oder Marshmallow",
			'es' => "Perro o Malvavisco",
			'pt' => "Cão ou Marshmallow",
			'context' => '',
		),
		array(
			'en' => "Doggo or Mop",
			'fr' => "Chien ou Serpillère",
			'de' => "Hund oder Scheuertuch",
			'es' => "Perro o Bayeta",
			'pt' => "Cão ou Pano de chão",
			'context' => '',
		),
		array(
			'en' => "doggo",
			'fr' => "chien",
			'de' => "hund",
			'es' => "perro",
			'pt' => "cão",
			'context' => '',
		),
		array(
			'en' => "mop",
			'fr' => "serpillère",
			'de' => "scheuertuch",
			'es' => "bayeta",
			'pt' => "pano de chão",
			'context' => '',
		),
		array(
			'en' => "marshmallow",
			'fr' => "marshmallow",
			'de' => "marshmallow",
			'es' => "malvavisco",
			'pt' => "marshmallow",
			'context' => '',
		),
		array(
			'en' => "Infinite Mode",
			'fr' => "Mode Infini",
			'de' => "Unendlicher Modus",
			'es' => "Modo Infinito",
			'pt' => "Modo Infinito",
			'context' => '',
		),
		array(
			'en' => "infinitemode",
			'fr' => "modeinfini",
			'de' => "unendlichermodus",
			'es' => "modoinfinito",
			'pt' => "modoinfinito",
			'context' => '',
		),
		array(
			'en' => "You too, try out infinite mode !",
			'fr' => "Toi aussi, essaye le mode infini !",
			'de' => "Testen Sie auch den unendlichen Modus !",
			'es' => "¡Tú también, prueba el modo infinito!",
			'pt' => "Você também, experimente o modo infinito !",
			'context' => '',
		),
		array(
			'en' => "Fat or Pregnant",
			'fr' => "Gros ou Enceinte",
			'de' => "Fett oder Schwanger",
			'es' => "Grasa o Embarazada",
			'pt' => "Gordura ou Grávida",
			'context' => '',
		),
		array(
			'en' => "fat",
			'fr' => "gros",
			'de' => "fett",
			'es' => "grasa",
			'pt' => "gordura",
			'context' => '',
		),
		array(
			'en' => "pregnant",
			'fr' => "enceinte",
			'de' => "schwanger",
			'es' => "embarazada",
			'pt' => "grávida",
			'context' => '',
		),
		array(
			'en' => "bald",
			'fr' => "chauve",
			'de' => "glatze",
			'es' => "calvo",
			'pt' => "calvo",
			'context' => '',
		),
		array(
			'en' => "knee",
			'fr' => "genou",
			'de' => "knie",
			'es' => "rodilla",
			'pt' => "joelho",
			'context' => '',
		),
		array(
			'en' => "Bald or Knee",
			'fr' => "Chauve ou Genou",
			'de' => "Glatze oder Knie",
			'es' => "Calvo o Rodilla",
			'pt' => "Calvo ou Joelho",
			'context' => '',
		),
		array(
			'en' => "Doggo or Joystick",
			'fr' => "Chien ou Joystick",
			'de' => "Hund oder Joystick",
			'es' => "Perro o Joystick",
			'pt' => "Cão ou Joystick",
			'context' => '',
		),
		array(
			'en' => "Joystick",
			'fr' => "Joystick",
			'de' => "Joystick",
			'es' => "Joystick",
			'pt' => "Joystick",
			'context' => '',
		),
		array(
			'en' => "Need a bigger challenge ?",
			'fr' => "Besoin d'un plus grand défi ?",
			'de' => "Benötigen Sie eine größere Herausforderung?",
			'es' => "¿Necesitas un desafío mayor?",
			'pt' => "Precisa de um desafio maior?",
			'context' => '',
		),
		array(
			'en' => "Try out infinite mode",
			'fr' => "Essayez le mode infini",
			'de' => "Probiere den unendlichen Modus aus",
			'es' => "Pruebe el modo infinito",
			'pt' => "Experimente o modo infinito",
			'context' => '',
		),
		array(
			'en' => "Give it a try !",
			'fr' => "J'essaye !",
			'de' => "Versuche es !",
			'es' => "Darle una oportunidad !",
			'pt' => "De uma chance !",
			'context' => '',
		),
		array(
			'en' => "Hold for as long as you can without being fooled, and try to beat your own record or the one of your friends!",
			'fr' => "Tenez le plus longtemps possible sans vous tromper, et tentez de battre votre propre record ou celui de vos amis !",
			'de' => "Halten Sie so lange, wie Sie können, ohne sich zu täuschen, und versuchen Sie, Ihre eigene Platte oder die einer Ihrer Freunde zu schlagen!",
			'es' => "¡Espere todo el tiempo que pueda sin ser engañado e intente batir su propio récord o el de sus amigos!",
			'pt' => "Mantenha-se o máximo que puder sem se enganar, e tentar vencer o seu próprio disco ou o de seus amigos!",
			'context' => '',
		),
		array(
			'en' => "infinite_mode_logo_white.png",
			'fr' => "infinite_mode_logo_white_fr.png",
			'de' => "infinite_mode_logo_white_de.png",
			'es' => "infinite_mode_logo_white_es.png",
			'pt' => "infinite_mode_logo_white_pt.png",
			'context' => '',
		),
		array(
			'en' => "infinite_mode_logo_blue.png",
			'fr' => "infinite_mode_logo_blue_fr.png",
			'de' => "infinite_mode_logo_blue_de.png",
			'es' => "infinite_mode_logo_blue_es.png",
			'pt' => "infinite_mode_logo_blue_pt.png",
			'context' => '',
		),
		array(
			'en' => "Want to try out something else ?",
			'fr' => "Envie d'essayer autre chose ?",
			'de' => "Willst du etwas anderes ausprobieren?",
			'es' => "¿Quieres probar algo más?",
			'pt' => "Quer experimentar outra coisa?",
			'context' => '',
		),
		array(
			'en' => "Want to try out something else ?",
			'fr' => "Envie d'essayer autre chose ?",
			'de' => "Willst du etwas anderes ausprobieren?",
			'es' => "¿Quieres probar algo más?",
			'pt' => "Quer experimentar outra coisa?",
			'context' => '',
		),
		array(
			'en' => "I made a score of {score} to {tag}, who can beat me?",
			'fr' => "J'ai fait un score de {score} à {tag}, qui peut me battre ?",
			'de' => "Ich habe eine Punktzahl von {score} zu {tag} gemacht",
			'es' => "Hice un puntaje de {score} a {tag}",
			'pt' => "Eu fiz uma pontuação de {score} para {tag}, quem pode me vencer?",
			'context' => '',
		),
		array(
			'en' => "Congratz ! You killed it !",
			'fr' => "Bravo, tu as réussi à venir à bout de cette catégorie !",
			'de' => "Herzlichen Glückwunsch, Sie haben diese Kategorie überwunden!",
			'es' => "Felicidades, ¡lograste superar esta categoría!",
			'pt' => "Parabéns, você conseguiu superar essa categoria!",
			'context' => '',
		),
		array(
			'en' => "Share your score with your friends, or try another category.",
			'fr' => "Partage ton score avec tes amis, ou essaye une autre catégorie.",
			'de' => "Teilen Sie Ihre Punkte mit Ihren Freunden oder probieren Sie eine andere Kategorie aus.",
			'es' => "Comparte tu puntaje con tus amigos o prueba con otra categoría.",
			'pt' => "Compartilhe sua pontuação com seus amigos ou tente outra categoria.",
			'context' => '',
		),
		array(
			'en' => "Too bad you were almost done !",
			'fr' => "Dommage tu y étais presque !",
			'de' => "Schade, dass Sie fast fertig waren!",
			'es' => "Lástima que ya casi terminaste!",
			'pt' => "Muito ruim você estava quase pronto!",
			'context' => '',
		),
		array(
			'en' => "Try again, pick another category or see if your friends can beat your score.",
			'fr' => "Retente ta chance, essaye une autre catégorie ou vois si tes amis peuvent battre ton score.",
			'de' => "Versuchen Sie es noch einmal, wählen Sie eine andere Kategorie aus oder sehen Sie, ob Ihre Freunde Ihre Punktzahl schlagen können.",
			'es' => "Inténtalo de nuevo, elige otra categoría o mira si tus amigos pueden superar tu puntaje.",
			'pt' => "Tente novamente, escolha outra categoria ou veja se seus amigos podem vencer sua pontuação.",
			'context' => '',
		),
		array(
			'en' => "Not too bad, try again or share your score with your friends !",
			'fr' => "Pas mal, essaye encore ou partage ton score avec tes amis !",
			'de' => "Nicht zu schlecht, versuchen Sie es noch einmal oder teilen Sie Ihre Punktzahl mit Ihren Freunden!",
			'es' => "¡No está mal, intenta nuevamente o comparte tu puntaje con tus amigos!",
			'pt' => "Não está mal, tente novamente ou compartilhe sua pontuação com seus amigos!",
			'context' => '',
		),
		array(
			'en' => "Search",
			'fr' => "Recherche",
			'de' => "Suche",
			'es' => "Buscar",
			'pt' => "Pesquisa",
			'context' => '',
		),
		array(
			'en' => "Most Popular Categories",
			'fr' => "Catégories les plus populaires",
			'de' => "Beliebteste Kategorien",
			'es' => "Categorías más populares",
			'pt' => "Categorias mais populares",
			'context' => '',
		),
		array(
			'en' => "Detected language : ",
			'fr' => "Langue détectée : ",
			'de' => "Erkannte Sprache : ",
			'es' => "Lenguaje detectado : ",
			'pt' => "Idioma detectado : ",
			'context' => '',
		),
		array(
			'en' => "go to my language",
			'fr' => "aller vers mon language",
			'de' => "gehe zu meiner Sprache",
			'es' => "vá para o meu idioma",
			'pt' => "ve a mi idioma",
			'context' => '',
		),
		array(
			'en' => "no thanks",
			'fr' => "non merci",
			'de' => "nein danke",
			'es' => "no gracias",
			'pt' => "não, obrigado",
			'context' => '',
		),
		array(
			'en' => "Teat or Condom",
			'fr' => "Tétine ou Préservatif",
			'de' => "Schnuller oder Kondom",
			'es' => "Chupete o Condón",
			'pt' => "Chupeta ou Preservativo",
			'context' => '',
		),
		array(
			'en' => "teat",
			'fr' => "tétine",
			'de' => "schnuller",
			'es' => "chupete",
			'pt' => "chupeta",
			'context' => '',
		),
		array(
			'en' => "condom",
			'fr' => "préservatif",
			'de' => "kondom",
			'es' => "condón",
			'pt' => "preservativo",
			'context' => '',
		),
		array(
			'en' => "Santa or Hobo",
			'fr' => "Père Noel ou SDF",
			'de' => "Weihnachtsmann oder Hobo",
			'es' => "Santa Claus o Vagabundo",
			'pt' => "Papai Noel ou Sem-teto",
			'context' => '',
		),
		array(
			'en' => "santa",
			'fr' => "père noel",
			'de' => "weihnachtsmann",
			'es' => "santa claus",
			'pt' => "papai noel",
			'context' => '',
		),
		array(
			'en' => "hobo",
			'fr' => "sdf",
			'de' => "hobo",
			'es' => "vagabundo",
			'pt' => "sem-teto",
			'context' => '',
		),
		array(
			'en' => "Message successfully sent. Thank you for contacting us.",
			'fr' => "Message envoyé avec succès. Merci de nous avoir contacté.",
			'de' => "Mitteilung erfolgreich gesendet. Danke, dass Sie uns kontaktiert haben.",
			'es' => "Mensaje enviado con exito. Gracias por contactarnos.",
			'pt' => "Mensagem enviada com sucesso. Obrigado por nos contatar.",
			'context' => '',
		),
		array(
			'en' => "Email address is missing.",
			'fr' => "L'adresse email est manquante.",
			'de' => "E-Mail-Adresse fehlt.",
			'es' => "Falta la dirección de correo electrónico.",
			'pt' => "Falta o endereço de e-mail.",
			'context' => '',
		),
		array(
			'en' => "Your score",
			'fr' => "Ton score",
			'de' => "Ihr Ergebnis",
			'es' => "Tu puntuación",
			'pt' => "Sua pontuação",
			'context' => '',
		),
		array(
			'en' => "Category not found.",
			'fr' => "Aucune catégorie n'a été trouvé.",
			'de' => "Kategorie nicht gefunden.",
			'es' => "Categoría no encontrada.",
			'pt' => "Categoria não encontrada.",
			'context' => '',
		),
		array(
			'en' => "Back to categories list",
			'fr' => "Retour à la liste des catégories",
			'de' => "Zurück zur Kategorienliste",
			'es' => "Volver a la lista de categorías",
			'pt' => "Voltar à lista de categorias",
			'context' => '',
		),
		array(
			'en' => "Pokemon or Digimon",
			'fr' => "Pokemon ou Digimon",
			'de' => "Pokemon oder Digimon",
			'es' => "Pokemon o Digimon",
			'pt' => "Pokemon ou Digimon",
			'context' => '',
		),
		array(
			'en' => "Home",
			'fr' => "Accueil",
			'de' => "Startseite",
			'es' => "Página principal",
			'pt' => "Pagina inicial",
			'context' => '',
		),
		array(
			'en' => "Challenge Mode",
			'fr' => "Mode Défi",
			'de' => "Herausforderungsmodus",
			'es' => "Modo Desafío",
			'pt' => "Modo Desafio",
			'context' => '',
		),
		array(
			'en' => "Ready to take the challenge? Try to enter in the legend.",
			'fr' => "Prêt à relever le défi ? Essaye d'écrire ton nom dans la légende.",
			'de' => "Bereit, die Herausforderung anzunehmen? Versuchen Sie, die Legende einzugeben.",
			'es' => "¿Listo para tomar el desafío? Trata de ingresar a la leyenda.",
			'pt' => "Pronto para enfrentar o desafio? Tente inserir a legenda.",
			'context' => '',
		),
		array(
			'en' => "Score added",
			'fr' => "Score ajouté",
			'de' => "Punktzahl hinzugefügt",
			'es' => "Puntaje agregado",
			'pt' => "Pontuação adicionada",
			'context' => '',
		),
		array(
			'en' => "An error occurred, please try again",
			'fr' => "Une erreur est survenue, veuillez réessayer",
			'de' => "Es ist ein Fehler aufgetreten. Versuchen Sie es erneut",
			'es' => "Ha ocurrido un error. Por favor intente de nuevo",
			'pt' => "Ocorreu um erro. Por favor, tente novamente",
			'context' => '',
		),
		array(
			'en' => "Rank",
			'fr' => "Rang",
			'de' => "Rang",
			'es' => "Rango",
			'pt' => "Classificação",
			'context' => '',
		),
		array(
			'en' => "Player",
			'fr' => "Joueur",
			'de' => "Spieler",
			'es' => "Jugador",
			'pt' => "Jogador",
			'context' => '',
		),
		array(
			'en' => "Score",
			'fr' => "Score",
			'de' => "Ergebnis",
			'es' => "Contagem",
			'pt' => "Puntuación",
			'context' => '',
		),
		array(
			'en' => "Best ranks",
			'fr' => "Meilleurs scores",
			'de' => "Hohe Punktzahlen",
			'es' => "Puntuaciones altas",
			'pt' => "Pontuações altas",
			'context' => '',
		),
		array(
			'en' => "Add your score",
			'fr' => "Ajouter votre score",
			'de' => "Füge deine Punktzahl hinzu",
			'es' => "Agrega tu puntaje",
			'pt' => "Adicione sua pontuação",
			'context' => '',
		),
		array(
			'en' => "Nickname",
			'fr' => "Pseudo",
			'de' => "Spitzname",
			'es' => "Apodo",
			'pt' => "Apelido",
			'context' => '',
		),
		array(
			'en' => "Username is invalid",
			'fr' => "Pseudo invalide",
			'de' => "Benutzername ist ungültig",
			'es' => "Nombre de usuario invalido",
			'pt' => "Nome de usuário Inválido",
			'context' => '',
		),
		array(
			'en' => "You need a better score to add it to the table",
			'fr' => "Vous devez faire un meilleur score pour pouvoir l'ajouter au tableau",
			'de' => "Sie benötigen eine bessere Punktzahl, um sie dem Tisch hinzuzufügen",
			'es' => "Necesita un puntaje mejor para agregarlo a la mesa",
			'pt' => "Você precisa de uma pontuação melhor para adicioná-lo à mesa",
			'context' => '',
		),
		array(
			'en' => "Arm of Tits",
			'fr' => "Bras ou Seins",
			'de' => "Arm oder Titten",
			'es' => "Brazo o Tetas",
			'pt' => "",
			'context' => '',
		),
		array(
			'en' => "arm",
			'fr' => "bras",
			'de' => "arm",
			'es' => "brazo",
			'pt' => "braço",
			'context' => '',
		),
		array(
			'en' => "tits",
			'fr' => "seins",
			'de' => "titten",
			'es' => "tetas",
			'pt' => "tetas",
			'context' => '',
		),
		/*array(
			'en' => "",
			'fr' => "",
			'de' => "",
			'es' => "",
			'pt' => "",
			'context' => '',
		),*/

	);
	return $general_translations;
}
