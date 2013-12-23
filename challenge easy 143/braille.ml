open Str

let translate_letter braille = match braille with
    | "O....." -> "a"
    | "O.O..." -> "b"
    | "OO...." -> "c"
    | "OO.O.." -> "d"
    | "O..O.." -> "e"
    | "OOO..." -> "f"
    | "OOOO.." -> "g"
    | "O.OO.." -> "h"
    | ".OO..." -> "i"
    | ".OOO.." -> "j"
    | "O...O." -> "k"
    | "O.O.O." -> "l"
    | "OO..O." -> "m"
    | "OO.OO." -> "n"
    | "O..OO." -> "o"
    | "OOO.O." -> "p"
    | "OOOOO." -> "q"
    | "O.OOO." -> "r"
    | ".OO.O." -> "s"
    | ".OOOO." -> "t"
    | "O...OO" -> "u"
    | "O.O.OO" -> "v"
    | ".OOO.O" -> "w"
    | "OO..OO" -> "x"
    | "OO.OOO" -> "y"
    | "O..OOO" -> "z"
    | _ -> " "
;;

let translate_lines line1 line2 line3 =
    let line1_tokens = Str.split (regexp " ") line1 in
    let line2_tokens = Str.split (regexp " ") line2 in
    let line3_tokens = Str.split (regexp " ") line3 in
        for i = 0 to (List.length line1_tokens) - 1 do
            let braille = (List.nth line1_tokens i ^ List.nth line2_tokens i ^ List.nth line3_tokens i) in
            let letter = translate_letter braille in
            print_string letter
        done
;;

let line1 = read_line () in
let line2 = read_line () in
let line3 = read_line () in
    translate_lines line1 line2 line3
;;
print_endline "";