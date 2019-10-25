<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class DOMNode {
	/* Properties */
	public readonly string $nodeName ;
	public string $nodeValue ;
	public readonly int $nodeType ;
	public readonly DOMNode $parentNode ;
	public readonly DOMNodeList $childNodes ;
	public readonly DOMNode $firstChild ;
	public readonly DOMNode $lastChild ;
	public readonly DOMNode $previousSibling ;
	public readonly DOMNode $nextSibling ;
	public readonly DOMNamedNodeMap $attributes ;
	public readonly DOMDocument $ownerDocument ;
	public readonly string $namespaceURI ;
	public string $prefix ;
	public readonly string $localName ;
	public readonly string $baseURI ;
	public string $textContent ;
	/* Methods */
	public appendChild ( DOMNode $newnode ) : DOMNode
	public C14N ([ bool $exclusive [, bool $with_comments [, array $xpath [, array $ns_prefixes ]]]] ) : string
	public C14NFile ( string $uri [, bool $exclusive = FALSE [, bool $with_comments = FALSE [, array $xpath [, array $ns_prefixes ]]]] ) : int
	public cloneNode ([ bool $deep ] ) : DOMNode
	public getLineNo ( void ) : int
	public getNodePath ( void ) : string
	public hasAttributes ( void ) : bool
	public hasChildNodes ( void ) : bool
	public insertBefore ( DOMNode $newnode [, DOMNode $refnode ] ) : DOMNode
	public isDefaultNamespace ( string $namespaceURI ) : bool
	public isSameNode ( DOMNode $node ) : bool
	public isSupported ( string $feature , string $version ) : bool
	public lookupNamespaceUri ( string $prefix ) : string
	public lookupPrefix ( string $namespaceURI ) : string
	public normalize ( void ) : void
	public removeChild ( DOMNode $oldnode ) : DOMNode
	public replaceChild ( DOMNode $newnode , DOMNode $oldnode ) : DOMNode
}