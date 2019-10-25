<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class DOMDocument extends DOMNode {
	/* Properties */
	readonly public string $actualEncoding ;
	readonly public DOMConfiguration $config ;
	readonly public DOMDocumentType $doctype ;
	readonly public DOMElement $documentElement ;
	public string $documentURI ;
	public string $encoding ;
	public bool $formatOutput ;
	readonly public DOMImplementation $implementation ;
	public bool $preserveWhiteSpace = TRUE ;
	public bool $recover ;
	public bool $resolveExternals ;
	public bool $standalone ;
	public bool $strictErrorChecking = TRUE ;
	public bool $substituteEntities ;
	public bool $validateOnParse = FALSE ;
	public string $version ;
	readonly public string $xmlEncoding ;
	public bool $xmlStandalone ;
	public string $xmlVersion ;
	/* Inherited properties */
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
	public __construct ([ string $version [, string $encoding ]] )
	public createAttribute ( string $name ) : DOMAttr
	public createAttributeNS ( string $namespaceURI , string $qualifiedName ) : DOMAttr
	public createCDATASection ( string $data ) : DOMCDATASection
	public createComment ( string $data ) : DOMComment
	public createDocumentFragment ( void ) : DOMDocumentFragment
	public createElement ( string $name [, string $value ] ) : DOMElement
	public createElementNS ( string $namespaceURI , string $qualifiedName [, string $value ] ) : DOMElement
	public createEntityReference ( string $name ) : DOMEntityReference
	public createProcessingInstruction ( string $target [, string $data ] ) : DOMProcessingInstruction
	public createTextNode ( string $content ) : DOMText
	public getElementById ( string $elementId ) : DOMElement
	public getElementsByTagName ( string $name ) : DOMNodeList
	public getElementsByTagNameNS ( string $namespaceURI , string $localName ) : DOMNodeList
	public importNode ( DOMNode $importedNode [, bool $deep = FALSE ] ) : DOMNode
	public load ( string $filename [, int $options = 0 ] ) : mixed
	public loadHTML ( string $source [, int $options = 0 ] ) : bool
	public loadHTMLFile ( string $filename [, int $options = 0 ] ) : bool
	public loadXML ( string $source [, int $options = 0 ] ) : mixed
	public normalizeDocument ( void ) : void
	public registerNodeClass ( string $baseclass , string $extendedclass ) : bool
	public relaxNGValidate ( string $filename ) : bool
	public relaxNGValidateSource ( string $source ) : bool
	public save ( string $filename [, int $options = 0 ] ) : int
	public saveHTML ([ DOMNode $node = NULL ] ) : string
	public saveHTMLFile ( string $filename ) : int
	public saveXML ([ DOMNode $node [, int $options = 0 ]] ) : string
	public schemaValidate ( string $filename [, int $flags = 0 ] ) : bool
	public schemaValidateSource ( string $source [, int $flags ] ) : bool
	public validate ( void ) : bool
	public xinclude ([ int $options = 0 ] ) : int
	/* Inherited methods */
	public DOMNode::appendChild ( DOMNode $newnode ) : DOMNode
	public DOMNode::C14N ([ bool $exclusive [, bool $with_comments [, array $xpath [, array $ns_prefixes ]]]] ) : string
	public DOMNode::C14NFile ( string $uri [, bool $exclusive = FALSE [, bool $with_comments = FALSE [, array $xpath [, array $ns_prefixes ]]]] ) : int
	public DOMNode::cloneNode ([ bool $deep ] ) : DOMNode
	public DOMNode::getLineNo ( void ) : int
	public DOMNode::getNodePath ( void ) : string
	public DOMNode::hasAttributes ( void ) : bool
	public DOMNode::hasChildNodes ( void ) : bool
	public DOMNode::insertBefore ( DOMNode $newnode [, DOMNode $refnode ] ) : DOMNode
	public DOMNode::isDefaultNamespace ( string $namespaceURI ) : bool
	public DOMNode::isSameNode ( DOMNode $node ) : bool
	public DOMNode::isSupported ( string $feature , string $version ) : bool
	public DOMNode::lookupNamespaceUri ( string $prefix ) : string
	public DOMNode::lookupPrefix ( string $namespaceURI ) : string
	public DOMNode::normalize ( void ) : void
	public DOMNode::removeChild ( DOMNode $oldnode ) : DOMNode
	public DOMNode::replaceChild ( DOMNode $newnode , DOMNode $oldnode ) : DOMNode
}