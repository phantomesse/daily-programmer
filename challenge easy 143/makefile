braille: braille.cmo
	ocamlc -o main str.cma braille.cmo

%.cmo: %.ml
	ocamlc -c $<

test:
	./test.sh

clean:
	rm -rf main *.cmo