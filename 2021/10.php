<?php

// see : https://adventofcode.com/2021/day/10

$input = ["[[{[<{{<<{<[<{<>[]}([][])>{{<>()}<()>}](({{}<>}[[]<>])<([]<>){[]()}>)>[<{{<>}<[]()>}[{[][]}<{}{}>]><{<", "{[<[({([[(<<(([]{}))<[{}()]>>>)]])<([<{[{({}{})[[]()]}[(()[])<{}()]]]{{[[][]]<<>[]>}}}{([([", "{<{<{(({[[([{<<><>>([]())}[{()[]}({}())]}<{{{}}{[]<>}}({<>{}})>){<(([]())([]<>))(<<>[]><[]<>>)>({[[]", "{[([<{<([{{(({()<>}({}<>)))(<{<>{}}](<<>[]><()()>))}{[{{[]()}(<>[])}{{[][]}{<>{}}}]}}{[{{{{}[]}<<>()>}}<{([]", "[({[{[(<<<[((<{}<>><{}{}>)({[]<>}((){}))){{[{}<>]{{}<>}}})[<[<<>>[<>{}]]{{<>[]}}>]>>[[([<{<><>}", "<[{[{[[<{[[{<<[]()>[{}<>]>}]<([{{}}({}{})])>]{<[[<<><>><()[]>]([[]<>]{[]<>})]{(([][]){()[]})", "((<(<(<[(<([(<{}<>>(()()))](<{{}[]}{()[]}>))<<<(<>[]){()()}>([<>{}]{{}})>({{[][]}(()())}(<", "{{([(<{<([([[[<><>][()<>]]{(()[])}])]({<[<<>>[()<>]]({()[]}[{}()])>]))>({<<[<{[]()}<<>[]>>{<[]", "([<{{((<({<[<({}<>)[[]()]>]([(<>)<(){}>](([][]){{}{}}))>{(({<>[]}<()()>){(()[])})[{{[][]}((){})}[([]<>)({}{})", "<<<{<{<([<[((<()<>]<[]()>)[(<>[])[{}<>]])]><[<[(()())[()()]]{[{}{}][()()]}>]{<<(<>())[<>[]]>>[<(()())<[]", "{<[[({<[{[{[({{}<>}<<>{}>){<{}[]><{}{}>}]{{<<>>}<(<>()){()<>}>}}]}{{<[({{}()})([()<>]{[]})", "(((([[(((<(<<(<>())[(){}]>([[][]]{()()})>{<[<>[]][()<>]>(([]{})[<>{}])})[({{()<>}({}())})]>([[[(()<>)][[<>()", "[<({([[[<<([<<<>()>>{[<>()](<>{})}]){<[[{}<>]]<{{}<>}([]{})>>}>[<<<{{}()}>>[[([][])<<><>>]({<>", "{<(<<{{<<[({{({}<>)[[][]]}(<()[]>[<>])}<{<()>{{}()}}>){{<[(){}][(){}>><{{}<>}[[]{}]>}}]<{<{", "{(<{<[<(<<(<[([][])<[]{}>]><{([]())(<>{})}{<(){}><[][]>}>><({({}[]){<>()}}{<{}>(())})>>{({{(<><>)[{}()]}", "[(<{[<<[{((({[{}<>][[]<>]}){(<{}<>>({}<>))<(<><>)[<>]>})<({{<>[]}}}>)}]>([{{<<{{[][]}(<>())}<{{}", "<<<[[{[<<{[{<(()[])<[]()>>}[(({}[]))(({}<>){<>})]](([{(){}}[<>]]<[{}{}]<{}<>>>))}>{{[(((()[]){(){}})(<(){}>{", "[{{<<([[[[<<[{(){}}{(){}}]{<{}()>(()())}>{{<{}()>}<[<><>][()()]>)>([{{()<>}<()[]>}[[<><>]{[]<>}]]{[{", "<[[{[{<[(({({[<>{}]}([<>[]]))<<[<><>]([]<>)>([{}()][()()))>}[((<{}>{[]{}}))[[{{}}[<><>]]]])(([{{[]()}<[]", "{{{<{([[[<[<{{(){}}({}{})}>[[{()[]}<[]{}>]<<()<>>[()[]]>]}<{[[[]()]<<><>>]({<><>}<[][]>)}{(<[]()><{}<>>)}>>", "([<<[(([{{[([{<>{}}])<[(()){<>{}}]>](<{([][])[<>()]}<{{}()}>>)}>{[{{(<()()>[<><>])((<><>){()()})}{([[][]])[[{", "[{((({<([{(<{(<>)[[]()]}({{}<>}<[]<>>)>)}(<<[({}{})]{({}<>)[<>()]}>>[<[[()<>]{<>()}][<[][]><<>{}>]>[<([][])[(", "(<[{<[<((<{<[{<>[]}{{}<>}]([[][]]{{}[]})>[<[(){}]{[]()}>({<>}{<><>}}]}>[[(<{()[]}<()[]>>[{{}()}<<>[]>", "({{<([{<<<<<{{()}({}())}<[()]{[]{}}>>[([()<>]([][]))<{()<>}>]>>>>}<{[[[<<<<>()>{[]{}}>[({}()){(){}}]", "<[{([<<(<(<[(({}()){[][]})[[(){}][[]()]]][<[{}]([][])>]>}>(<{[({[]<>}{(){}})<(<>)({}())>]<[({}<>)<{", "(({[{<({<<[<{{[]<>}[<><>]}{{{}}<()[]>}>]<<<{()()}{{}<>}>([[]()][<>()])>>><[([(<><>)<()[]>]", "{([<<[{[(({[{{()<>}({}{})}<[{}[]]<(){}>>]<{<[]<>>}<[()()][()()]>>}<<[[(){}](<><>)]><(<{}[]>", "{([<{<([(<(<(<[]{}>{<>()}){{<>{}}}>({<[][]>(<>{})}))<[<[{}{}]<{}{}>>{(<>[])(<>())}][<{{}<>}(()[]", "[{[(<(({{(<{(<[][]>){[<>{}]}}{<{(){}}{<><>}>({[]{}}{[]{}})}>)(<[(([]<>))[[[]()]<[]<>>]]<{({}[])<{}<>>}[", "[{<{({((<{[{[<<>{}>[[]]]{<{}()>[<>]}>]}>[{([(<[][]>{[]()}){<(){}>[<>[]]}][[([]<>)<[]{}>]{{{}}[{}]}])([", "{<(<({[{[(({((<>[])<{}{}>)({[]<>>[{}[]])}([{(){}}([])]{<<>[]>[{}()]}))[[<[<><>]<<><>>>{[()()]<", "{{{<[<<{(<(([({}<>)<()>]{<()()><[]<>>})(<[()[]]{[]{}}>{{{}{}}(<>())}))({([[]()]{()[]}){{{}<>}[", "(<({{[{<{[<[[{[]()}]([[]()][<>{}])][[[<>]{<>}]<([]{})<{}[]>>]>{[{{<><>}[[][]]}<{[]{}}({}())>](<[[]()]({", "<<[{[<{<[[(<[<(){}>(<>)](<[]<>>[[]()])>{<<{}[]><{}()>>[(()[])(<>{})]})({({{}<>}[<>{}])}{({[][]}<<><>>)})]({<[", "[[([<{{(<({[{([][])(()<>)}]{{{[]<>}[()()]}[({}{})[()[]]]}}>><[[{{[()()]({}())}}({(()[])[[]()]}{", "<<{(<(([{((<([()()]){{[]<>}{{}()}}>)<<<({}<>)[<>{}]><({}[])<[]<>>>>(<[[]]{(){}}>(([][])([])))>)[{[{([]<>)[<>{", "[(<(<<{{[([[[({}{})<()())]({[]}{{}[]})]({[()()]([]{})}{({}[])[[]()]})]<[[{<><>}<[][]>][[[]()]{(){}}]]>){(([<(", "[[<[<{<[{({{{{<>{}}<[]()>}<<(){}>>}<{{{}{}}{()<>}}[([]{}){<>{}})>})[[((<<><>>[{}[]])<{()<>}<()", "((<(<<[[{{{(<<{}()>[()()]><((){})>)[[[[][]][()[]]][{[]<>}<{}{}>]])((([[]{}]<[]{}>))([{<>{}}(<", "{{(({[{[({({<<<>[]><<>[]>>{{()[]}[{}()]}})[{(<{}<>><[]>)(({}[]){{}[]})}<<<[]()><[]{}>><{<><>}<()<>>>>]})", "[(<[{[<({{[{<[<>()]([]{})><{(){})[()[]]>}<(<()()>(()()))(<{}[]>({}[]))>]([([[]()]({}{}))({(){}}([](", "{({(({[<{<[<<{<><>}(<>[])>[<{}{}><[]<>>]><<{<>}>>](<<<()<>>(()<>)>{<{}[]>([]<>)>>)>}<{<{{<<", "<([[[(({[{<(({<>[]}<<>[]>){<{}[]>([]()))){<({}<>)<[][]>>{<{}{}>{()[]}}}>{((({}{})[{}[]]))({[<><>]}<<<>{}", "[{[[[{<<(({[({[][]}<[]<>>)<{{}()}{{}}>]{({[]}[<>{}]){<[][]>[{}{}]}}})[[([<<>()>(<>[])]<<<>", "<({<<[(({[([{[()[]]({}{})}{{()[]}[()[]]}])[([((){}){<><>}]{<()[]>{{}{}}})]][[{<[()()]({}<>", "[{<([<({{<<[((<>[])(<><>))((()[])([][]))][(([][])<<>()>)]>[<<{()<>}<{}<>>><<{}<>>{()<>}]><{[()[", "[<{[<([{((({<<[]{}><{}{}>>([{}<>]<<><>>)})[[(<{}<>>([]<>))<<{}()>{{}<>}>]{[<[]<>>][[{}<>]<{}[", "({<{<[<({([<{<()()>{{}[]}}({<>{}})><{[[]<>]<[]()>}<[{}()]{{}[]}>>])}([<<[{[]<>}<<><>>][<[]{", "{[({<[[<<<(<{<{}<>>(()())}[{()}{()<>}]>)[<{{(){}}(()<>)}>{[([]{})(()<>)]{[(){}]{()[]}}}]>{{[<<[]()><()<>>>{", "<[{{({({(<<{[(()<>){[]()}][<[]>(()())]}{<(<><>}{()[]}>}>(<<{{}()}<[][]>>[{()<>}{{}{}}]>)>)}<[(<((<(", "[<{[<[{[[[([<(<>{}){{}<>}>(<<>{}>{{}{}})]{({<>[]}<{}()>)<({}<>)<{}{}>>}){<[[[]{}]{{}{}}]<<[]<>>(()[])>", "{[{((<(<[(((<({}[]){[]()}>)))]([{<(<<>{}>[[]])<[[][]][(){}]>>[{[{}<>]{[]<>}}{(<>())(())}]}[{<{{}()}<<>[]>>}[[", "[[[{{(<<<<((<((){}){[]<>}><<(){}><()<>>>){[<[][]>({}[])](({}{})<[][]>)})[[{(<>>}([{}()][{}()])]]>>>((<{[", "[[({<[[<([<[((<>{})({}<>))({{}{}}(()[]))]<<((){})<()()>>[<[][]><{}{}>]>>({[<()()>[[][]]]})])>", "([<(<{(<<[<{{([]<>)[<>[]]}<<()()>[(){}]>}><([[<>[]]](({}[])))({(()())<(){}>}<[<>>[()()]>)>]>>)", "{(({([{[{(<[[((){})(<>{})]<(()())(()[]>>]{([{}]{[][]})}>)<((((()<>)[<><>])<((){})[()()]>)[[<()<>>][<{}", "{{([{{<<({{<<<[]()><()[]>}{{()<>}}>[<{()<>}<[]{}>><{{}[]}[{}[]]>]}})({{({[<>{}]<(){}>}(<<>>(()<>)))(<", "<[[{<(<{{<[<{({}())}({[][]}{<><>})>{[<<>{}><()[]>]<[<>[]]<<>[]]>}]>(({[{[]()}<[]<>>]{<<>><<>[]>}}))}([[<", "([{<[{<({{[((<{}<>>[(){}])({()<>})){{<<>{}>}[<{}()>{()[]}]}]}[{(({()[]}(<><>))[<{}()>(<>[])])<[{()[]}[", "{<[{({<((<({[{[][]}{{}[]}]{[<>()][<>{}]}}((({}())([]()))<([][])[[][]]>)}({[[[][]]({}())]}{({{}}){(<>[])", "{{[{{({(<(<[[[[]{}](<><>)]([[]{}]{<>[]})]>({{{()[]}([])}[{[][]}(<><>)]](({[]}<<>[]>))))>)}({{[{{(([])", "[<[{[{<<({{[{[<>{}]<(){}>}]}<{(({}()){{}<>})(<{}()>{[]<>})}{<[[]{}]>}>}[<[[([][])[[]]]]{{([]())[{}<>]}<({", "([<({{[((<({(([]<>){[]<>))[({}())([]<>)]})[{{{{}<>}{{}[]}}}<<([]{})({}[])>[<()[]>]>]><([[[{}<>]<()>]([<>{}", "<[<{[[[<{{[[([[]<>]{(){}))[[{}<>][[][]]]](([<>[]]<<>[]>)[(()<>){()<>}])]}[<<((())(<>{}))<{[]()}<[", "[{[[{[[(<<(<({{}[])[<>()])><[[[]()](<>())]<{[]<>}({}())>>){[<{<>{}}[[]<>]>]}>{{<[<<>()>[()[]]", "[(([{(([{<[<[<{}[]>[<><>]]>({[{}{}]{[]{}}})]>}{{[[<[{}{})<()()>>{{<>}{{}[]}}]{{([][])[<>{}]}{", "(((<<<<[(<[<{{()()}<[]{}>}<{[][]}{<>[]}>>[[[()()]{{}{}}]]]({[<()()><[]{}>]{{[]{}}([]())}}<{<()<>>[<>]}<<{}", "<([<[[<<[(({(({}())<{}>)<(()[])[{}[]]>})<<({{}}[[]{}])[({}{})((){})]><<{{}()}{[][]}>>>)]>[[(", "<<<{(<{{(([{<{()[]}><<[]{}>{{}[]}>}{(<[][]>[[]<>])[{()<>}]}](<[[<><>][<>[]]]([()[]]<{}()>)>))<(", "{[[([<<[[(<((<()()>(<><>))[[{}()]<()<>>]){[((){}){[]{}}][[{}[]]]}>([<((){}){(){}}>[([]{}){()[]}]]))]<[<<{<<><", "([{[{([<{{{[<(()[])({}())>{[<>{}]{{}<>}}]{(([]<>){<>}){[()<>]<()[]>}}}(<<[{}<>](()[])>{[[]()]", "[<((<<<[{[((([<>{}]){[(){}]})<<{<>{}}({}[])>[[[]{}]<()[]>]>){<(<<>()>(<>[]))[(()[]){[]<>}]>", "<(([({[[[[<<[[[]()]]<<()[]>>>>{{<[()[]]{{}{}}>{<[]()>{()[]}}}<[({}<>)[()<>]]>}]([([[()()]<<>{}>])<{<{", "<{([([((<{{[([()[]]{{}()})][(<<><>>){{{}[]}[[]<>]}]}}>[((<(<<>>[[]<>])[(()[]){()<>]]><<{{}", "{<[[({{<<[<<<{()[]}<<>{}>>([[]<>]((){}))>[{[<>()]{{}<>}}[({}())]]>{[{{[]()}({}())>]({{(){}}<()<>>}{<(){}>{", "{(<[{[{{[<(<({(){}}<[]()>)(<<>[]>{<>{}})>)>]({[{[({}()){<><>}]<[[]<>]{<>{}}>}(<<{}{}>([]<>)>(({}{}){(", "((<((((<<({[{{{}[]}(()())}{<()()>}]<[[<>[]][(){}]][{()[]}]>}(([<[][]>][<[]()>({}[])])[<<[]()>[{}<>", "[[{<[(<{{<{<[{<>()}[[]]]({{}<>})>{{{()[]}<{}<>>}}}<({{()[]}}[[<>()](()[])])<[([]<>)[{}<>]][([][]", "<{{[{[{(<<({{{{}[]}{[]<>}}<[[]{}]{{}[]}>}[({{}{}}<[]()>){[[]<>]}])((<{()()}[[]{}]>({()<>}<", "({{{<({{<<[<[{()<>}[[]<>]]<[{}{}][<>[]]>>({[{}()]<<>>}[(<><>)({}())])][([{<>()}{<>{}}]{(<>()){()[]", "[((<({(<<({[<(<>{})<[]<>>>[([])[(){}]]][{{()<>}(<><>)]<[{}{}][{}<>]>]}{<{(<><>)[{}[]]}(([])[[]{", "(([{<[<{<<{{({()[]}{<>{}})[[[]<>]<[][]>]}<{<()<>>[()()]}{<<>><()<>>}>}>>[<[[<[{}<>]{[]{}}><(<", "(<<<[<<<(([{{<()<>>[<>[]]}{<()[]>([][])}}])(([{{{}{}}[<>()]}({<>()}{[]{}})]<[<<>[]>]{({}<>){[]<>}", "{<<[<([[({({{<{}[]>([]{})}[<()<>>[(){}]]}{[(()<>)]{<()[]>({}[])}}){<([{}[]]({}<>))(({}{})(()<>))><([(){}]<{}", "{{[[<(<({<([[{[]{}}(()[])]<(<>[])>])({[[{}[]]({}<>)]})>[(<<[{}{}]<[]<>>>>{{{[]<>}[{}()]}({<><>}<<>()])}){([<", "{[[{{<(({(([[<()>{()<>}]([[]()]([][]))]<<({}[]){[][]}>([<><>]{()()})>)((<[<><>]{[]<>}>[[[][])[[]<>]", "[[<<{[[{([<{({[]()}({}())){{{}<>}<()()>}}([{{}()}<{}()>][{<>}[()<>]])><{{{{}[]}(<><>)}{[[]<>]<[]<>>}}>])}", "({(({(<({[{((<{}><{}>){<{}()>[{}[]]})}]{[<({<><>}({}()))>{{({}<>)(()<>)}{<{}{}>{<>[]}}}]}}({[{([[]{}])[<()", "({[{<<[<<[{{{{[][]}[()[]]}<<{}()>{{}()}>}{({<><>}([]))[<{}<>>(<>{})]}}{[([<>{}][()<>])([()[]])]}]<{[(<<><>", "{<{<(({[[{(({{()<>}[[]<>]}[[()<>][()()]])(<((){})[<><>]>{[[]<>][()<>}}))}<[<{{{}}[{}[]]}<(", "{{<[[(<[{<<((<{}<>>{(){}}))((<[]<>><{}{}>)({<>()}<()<>>))>>({[{(()[])<{}<>}}(<()()>)][<[<>{}]{<>", "<[<{((([<(<<((<>())<<>()>)>(<{<>()}{[]<>]>)>)[[{{{()[]}(()())}{({}())({}<>)}}](<[{()()}<()()>]((()){<>[]})><[", "(<([{[[[[[(<(<<>{}>)<{{}{}}>>(<<[]()><[]()>>(<(){}]{()()})))]]]({(<{(<()>([]{}))[{()<>}{[][]}]}([<", "(([({{{<(<{[<[<>[]](<>())>(<{}{}>)]<(([]<>>(()[]))(<()()>(<>{}))>}>({{[{[][]}][{[]<>}([]{})]}(<(()", "({({<{[{{([(<(()())><{[]{}}(<>())>)(<[()()]{()()}>[[[]()](<><>)])]{<<[[]<>](<>())>(({}{})<<><>>)>", "((([[{[<[{(<[{<><>}{{}<>})>{<[<>{}](<>)>[<[][]><[]{}>]}){[{{()[]}<<><>>}<(<><>)({}{})>]{<{(", "[[<({([{{[<{<(()())<[]<>>>{[[]{}]}}(<[{}<>]<<>()>><(()<>)[()()]>)>>{<{<[[]<>]{[]()}>{<[]<>>{[", "(({[[(([[<{([[{}<>]{()()}][[{}[]]{[]{}}]){[[()[]]<[][]>][<{}{}><{}{}>]}}[{[({}())[[]<>]]}{[({})<<>>]<{<>[]}"];

$points1 = 0;
$points2 = [];
foreach ( $input as $key => $line ) {

	$isEnd = false;
	$search = [ "()", "[]", "{}", "<>"];

	//iterate on line while have search value
	while( ! $isEnd ){
		$line = str_replace( $search, "", $line );

		//condition for stop while, check if has search
		if( strpos( $line, "()" ) === false && strpos( $line, "[]") === false && strpos( $line, "{}" ) === false && strpos( $line, "<>") === false ){
			$isEnd = true;
		}
	}

	// if false, that meen we have no error detected 
	$error = false;

	//traitement for answer 1
	foreach ( str_split( $line ) as $carac ){
		switch ($carac) {
			case ')':
				unset( $input[ $key ] );
				$points1 += 3;
				$error = true;
				break 2;
			case ']':
				unset( $input[ $key ] );
				$points1 += 57;
				$error = true;
				break 2;
			case '}':
				unset( $input[ $key ] );
				$points1 += 1197;
				$error = true;
				break 2;
			case '>':
				unset( $input[ $key ] );
				$points1 += 25137;
				$error = true;
				break 2;
		}
	}

	//for part 2, if its valid line
	if( ! $error ){

		//reverse the query and replace value by inverse equivalent "(" by ")" etc
		$reverse = strrev($line);
		$reverse = str_replace( "(", ")", $reverse );
		$reverse = str_replace( "{", "}", $reverse );
		$reverse = str_replace( "[", "]", $reverse );
		$reverse = str_replace( "<", ">", $reverse );

		//calcul points
		$points = 0;		
		foreach( str_split( $reverse ) as $carac ){
			$points *= 5;
			switch ($carac) {
				case ')':
					$points += 1;
					break;
				case ']':
					$points += 2;
					break;
				case '}':
					$points += 3;
					break;
				case '>':
					$points += 4;
					break;
			}
		}
		$points2[] = $points;
	}
}

//get the median value for answer 2
sort( $points2 );
$median = ceil( count( $points2 ) /2 ) -1;

echo "first answer : " . $points1 . "<br />";
echo "second answer : " . $points2[ $median ];