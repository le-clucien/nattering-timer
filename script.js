let	minutes = 0
let	seconds = 0
let	centiseconds = 0

let	interval = null
let	isPlaying = false
let	_element = document.getElementById("stopwatch").childNodes[ 0 ]

let	audio = new Audio('sax.mp3');

function pad( d ) {
	return ( d < 10 ) ? ( "0" + d.toString() ) : d.toString();
}

function	writeToElementData()
{
	_element.data = pad( minutes ) + ":" + pad( seconds ) + ":" + pad( centiseconds )
}

function	addMillisecond()
{
	++centiseconds

	if ( centiseconds === 100 )
	{
		centiseconds = 0
		++seconds
	}
	if ( seconds === 100 ) 
	{
		seconds = 0
		++minutes	
	}
	writeToElementData()
}

function	playButton() {
	if ( !isPlaying )
	{
		interval = setInterval( addMillisecond, 10 )
		isPlaying = true
		audio.play()
	}
}

function	pauseButton() {
	if ( isPlaying )
	{
		clearInterval( interval )
		isPlaying = false
		audio.pause()
	}
}

function	resetButton() {
	if ( isPlaying )
	{
		clearInterval( interval )
		isPlaying = false
		/* tmp way to reset */
		audio = null
		audio = new Audio( 'sax.mp3' )
	}
	minutes = 0
	seconds = 0
	centiseconds = 0
	writeToElementData()
}
