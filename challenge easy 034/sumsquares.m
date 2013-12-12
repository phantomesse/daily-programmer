function sum = sumsquares(a, b, c)
    array = [ a, b, c ];
    minindex = find(array==min(array));
    sum = 0;
    for i=1:length(array)
        if i ~= minindex(1)
            sum = sum + array(i)*array(i);
        end
    end
end

