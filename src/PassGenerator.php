<?php

require_once "GeneratorSettings.php";

$spanishList = ["hablo", "tendre", "mato", "papel", "honor", "juro", "caja", "michael", "alrededor", "libertad", "dulce", "vosotros", "trae", "tratando", "hermoso", "lindo", "esa", "gracioso", "abuela", "asi", "sentir", "personal", "tipos", "vienen", "interesante", "vieja", "dejado", "sean", "llega", "esposo", "respuesta", "luna", "cualquiera", "linda", "i", "camara", "horrible", "principio", "tengas", "terminado", "hubo", "hicieron", "carcel", "oir", "agente", "listos", "tenias", "tendremos", "busca", "cita", "baja", "partes", "hazlo", "tia", "pudo", "rio", "piso", "negocios", "sistema", "n", "regalo", "salvo", "sargento", "salud", "completamente", "totalmente", "harry", "carne", "infierno", "decirme", "tuya", "carrera", "ambos", "cielos", "deje", "beber", "cumpleanos", "veras", "calma", "cuantos", "basura", "abuelo", "universidad", "traves", "suelo", "nena", "programa", "vestido", "verdadero", "triste", "salio", "director", "santo", "bob", "iremos", "prometo", "bailar", "novio", "corre", "banco", "encanta", "sientes", "dolor", "suena", "situacion", "estupido", "permiso", "avion", "mitad", "comprar", "muertos", "acabo", "mente", "proxima", "mejores", "entendido", "decia", "dano", "mensaje", "siete", "deseo", "asesino", "darle", "maravilloso", "trabajando", "mesa", "hacia", "ten", "traje", "caballo", "coronel", "sexo", "entra", "divertido", "pensaba", "sam", "ellas", "tom", "david", "//", "informacion", "amable", "encontre", "adentro", "the", "dale", "propio", "eras", "cena", "tendras", "charlie", "alma", "das", "abre", "temo", "gobierno", "fuiste", "culo", "cancion", "dijeron", "media", "derecha", "funciona", "centro", "dare", "miren", "estaria", "encontrado", "foto", "vayas", "frio", "teniente", "izquierda", "san", "accidente", "vine", "estabamos", "servicio", "terrible", "abogado", "pude", "perra", "doy", "ante", "navidad", "llamas", "necesario", "bonita", "m", "junto", "linea", "sale", "normal", "uds", "direccion", "regresar", "tienda", "ocho", "paul", "pies", "preguntas", "haria", "haz", "tonto", "vamonos", "trato", "bonito", "acaba", "fuerza", "aire", "hablas", "verlo", "crei", "conoce", "hambre", "simplemente", "vive", "empezar", "carta", "barco", "campo", "frank", "lamento", "hotel", "bano", "anda", "tuyo", "grupo", "vuelto", "poner", "usar", "voz", "quedate", "pase", "joe", "noticias", "sol", "placer", "pie", "decirte", "conseguir", "estuve", "blanco", "george", "espere", "decirle", "sientate", "secreto", "llegado", "podriamos", "recuerda", "compania", "hermosa", "tras", "siente", "deberiamos", "profesor", "medico", "vista", "negocio", "tren", "edad", "llego", "loca", "silencio", "gustan", "futuro", "pagar", "novia", "raro", "prisa", "sal", "viste", "control", "cambiar", "quiera", "imposible", "dan", "dejo", "amiga", "enseguida", "haremos", "llamada", "error", "maldicion", "llevo", "diferente", "mes", "ejercito", "ganar", "ley", "acabo", "pelo", "siguiente", "maestro", "propia", "vio", "tendra", "oro", "oficial", "grandes", "minuto", "vuelve", "buscando", "diez", "vemos", "sitio", "gusto", "unica", "sabemos", "jack", "viaje", "jugar", "irme", "demas", "peor", "orden", "mil", "ropa", "muchacho", "dado", "ocurre", "cambio", "extrano", "perdido", "pasando", "oficina", "estaban", "presidente", "hara", "caballeros", "semanas", "conoces", "anoche", "aca", "queremos", "libre", "especial", "sino", "negro", "derecho", "palabras", "millones", "modo", "otras", "pobre", "frente", "buscar", "piensas", "hacemos", "acerca", "segura", "correcto", "disculpe", "seas", "llamar", "armas", "sucede", "puesto", "boca", "atencion", "detras", "duro", "asunto", "mala", "demonios", "encima", "odio", "seguridad", "york", "llevar", "hospital", "deben", "llamo", "sueno", "resto", "tranquilo", "mire", "perfecto", "quieras", "perder", "ayudar", "ese", "estare", "dile", "tuvo", "pena", "increible", "prueba", "largo", "probablemente", "recuerdas", "llamado", "cual", "veras", "quisiera", "ayer", "plan", "real", "siendo","ok", "diablos", "medio", "tampoco", "cama", "telefono", "ei", "equipo", "adonde", "lejos", "palabra", "diga", "trata", "matar", "preocupes", "pais", "segundo", "tuve", "oportunidad", "este", "luz", "necesitamos", "seis", "incluso", "hagas", "verte", "esperando", "idiota", "cuarto", "estara", "algunas", "querido", "senorita", "esta", "cuanto", "perdon", "estabas", "vivo", "john", "recuerdo", "fueron", "carajo", "necesitas", "tenga", "pelicula", "creer", "falta", "cielo", "venido", "general", "oido", "pequena", "perro", "s", "rey", "esperar", "pienso", "lista", "calle", "fuego", "ademas", "par", "habra", "di", "exactamente", "pensando", "padres", "seguir", "mucha", "marido", "habria", "dire", "afuera", "nina", "podrias", "ia", "paso", "dio", "sentido", "habitacion", "cafe", "mia", "digas", "musica", "murio", "entiendes", "lleva", "estuvo", "ultimo", "bebe", "libro", "nuestras", "piensa", "callate", "arma", "ello", "jamas", "aqui", "diciendo", "muchachos","aunque", "cuatro", "cerca", "cree", "sigue", "dame", "ninguna", "listo", "igual", "muchos", "pequeno", "significa", "dejar", "hago", "clase", "capitan", "doctor", "llegar", "genial", "suficiente", "trabajar", "tomar", "hey", "joven", "vivir", "abajo", "haya", "justo", "hubiera", "primer", "numero", "necesita", "pensar", "puta", "fui", "entrar", "conozco", "misma", "fuerte", "srta", "basta", "comer", "algunos", "morir", "este", "atras", "dicen", "dificil", "amo", "vino", "dar", "bastante", "unas", "pueda", "punto", "hijos", "podia", "final", "hermana", "meses", "sangre", "escuela", "haga", "realidad", "queda", "pueblo", "hiciste", "ultima", "coche", "juego", "dime", "paz", "encontrar", "cuerpo", "eran", "ay", "dolares", "vuelta", "mayor", "ire", "sola", "tenido", "hacen", "malo", "dr", "maldita", "maldito", "alto", "saben", "deberias", "facil", "comida", "chicas", "querida", "pregunta", "culpa", "dormir", "ido", "fiesta", "posible","miedo", "buenos", "puerta", "e", "contra", "casi", "cuanto", "esas", "espero", "pronto", "venga", "chico", "ninos", "agua", "paso", "cualquier", "pense", "ciudad", "primero", "hacia", "historia", "camino", "debes", "deja", "dentro", "viene", "ano", "os", "forma", "guerra", "durante", "esposa", "volver", "feliz", "cual", "adelante", "alla", "ojos", "hice", "caso", "vi", "mano", "chicos", "minutos", "muerte", "toma", "gustaria", "hare", "semana", "loco", "supuesto", "pasar", "entiendo", "iba", "jefe", "manos", "corazon", "venir", "supongo", "problemas", "ayuda", "dejame", "vete", "juntos", "nino", "importante", "arriba", "sra", "otros", "hija", "cinco", "mas", "fin", "personas", "hablando", "cara", "habla", "mujeres", "llama", "cuando", "ningun", "tierra", "grande", "manera", "bajo", "nuestros", "persona", "dices", "tio", "io", "horas", "dijiste", "auto", "escucha", "unico", "poder", "quieren", "siquiera", "debemos", "quizas","nuevo", "estado", "menos", "tipo", "nuestro", "debe", "sido", "buen", "conmigo", "mal", "todas", "nombre", "mio", "crees", "haciendo", "toda", "amor", "visto", "queria", "importa", "tarde", "parte", "estas", "tienen", "aun", "necesito", "nuestra", "tanto", "eh", "cada", "ve", "veces", "hora", "contigo", "haber", "oye", "buenas", "hombres", "hacerlo", "demasiado", "haces", "dicho", "quien", "saber", "ah", "entre", "adios", "vaya", "unos", "cierto", "debo", "problema", "razon", "esos", "alguna", "pues", "quiza", "hemos", "idea", "veo", "chica", "policia", "amigos", "hizo", "serio", "realmente", "ustedes", "estos", "cabeza", "digo", "hermano", "van", "carino", "salir", "vale", "familia", "pasado", "cuenta", "muchas", "algun", "somos", "senora", "pueden", "muerto", "viejo", "noches", "lado", "deberia", "todavia", "sabia", "rapido", "ves", "ud", "suerte", "cuidado", "seria", "mientras", "da", "primera", "nueva","estaba", "entonces", "mejor", "esa", "hace", "hombre", "dios", "va", "tambien", "vida", "estan", "sin", "sr", "ver", "has", "siempre", "ahi", "ti", "hasta", "siento", "puedes", "ni", "decir", "oh", "sobre", "anos", "tenemos", "uno", "dia", "cosas", "noche", "alguien", "antes", "mis", "ir", "poco", "otra", "quiere", "solo", "nadie", "nosotros", "gente", "parece", "padre", "dinero", "estar", "hecho", "les", "sea", "estamos", "mismo", "dijo", "mira", "trabajo", "pasa", "claro", "vas", "ellos", "manana", "otro", "han", "hablar", "despues", "desde", "tal", "mundo", "sabe", "acuerdo", "habia", "momento", "fuera", "hijo", "amigo", "donde", "seguro", "podria", "mujer", "dias", "madre", "tus", "cosa", "alli", "lugar", "dice", "gusta", "gran", "tenia", "sera", "mierda", "mama", "papa", "hoy", "espera", "tres", "ven", "buena", "tener", "luego", "dije", "podemos"];

/**
 * Will generate a passphrase based on the settings given by a GenneratorSettings object.
 * This won't be initialized without a GeneratorSettings object being passed in
 */
class PassGenerator{

	private $settings;

	/**
	 * PassGenerator will only initialize with a GeneratorSettings object passed in
	 * 
	 * @param GeneratorSettings $settings - defines the configurations of the 
	 * passphrase such as number of words, whether to have numbers, and 
	 * whether to have special characters, etc
	 */
	public function __construct(GeneratorSettings $settings){
		$this->settings = $settings;
	}


	/**
	 * Takes the settings passed in from initializing the GeneratorSettings object, 
	 * and uses those settings to return a passphrase from randomly picked out words
	 * from the $settings's wordlist
	 * 
	 * @return String - passphrase based on the configurations of $settings. 
	 */
	public function generate(){
		$settings = $this->settings;
		$chosenWords = [];
		$wordlist = $settings->wordlist;
		$numWords = $settings->numWords;

		// Randomly pick a new word to go in sequence
		for($i = 0; $i < $numWords; $i++){
			$random_i = rand(0, count($wordlist)-1);
			$chosenWords[] = $wordlist[$random_i];
		}

		// Combine words with delimiter
		$passphrase = implode($settings->seperator, $chosenWords);	

		// First Upper Case
		if($settings->uc1st){
			$passphrase = ucfirst($passphrase);
		}
		

		// add num
		if($settings->hasNum){
			$passphrase .= rand(0,9);
		}

		// add special character
		if($settings->hasSpclChar){
			$spclChar = GeneratorSettings::$possibleSpclChar;
			$passphrase .= $spclChar[rand(0, count($spclChar)-1)];
		}


		return $passphrase;
	}
}

?>